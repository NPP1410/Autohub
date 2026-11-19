<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendUser;
use App\Services\Frontend\GoogleOAuth;
use Illuminate\Cache\RateLimiter;
use Illuminate\Database\QueryException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use UnexpectedValueException;

class GoogleAuthController extends Controller
{
    public function __construct(private GoogleOAuth $google) {}

    public function redirect(Request $request)
    {
        if (!$this->google->configured()) return $this->failure('ยังไม่ได้ตั้งค่า Google Sign In กรุณาใช้อีเมลและรหัสผ่านก่อน');
        if (Auth::guard('frontend')->check()) return redirect()->route('frontend.home');
        $limiter = $this->limiter();
        $key = 'frontend:google-start:'.hash('sha256', (string) $request->ip());
        if ($limiter->tooManyAttempts($key, 10)) return $this->failure('ลองเข้าสู่ระบบหลายครั้งเกินไป กรุณารอสักครู่');
        $limiter->hit($key, 60);
        $request->session()->forget(['frontend.google.oauth', 'frontend.google.pending']);
        $state = Str::random(64); $verifier = Str::random(96);
        $request->session()->put('frontend.google.oauth', ['state' => $state, 'verifier' => $verifier, 'expires' => now()->addMinutes(10)->timestamp]);
        return redirect()->away($this->google->authorizationUrl($state, $verifier));
    }

    public function callback(Request $request)
    {
        $oauth = $request->session()->pull('frontend.google.oauth');
        $request->session()->forget('frontend.google.pending');
        $state = $request->query('state');
        if (!$this->google->configured() || !is_array($oauth) || !is_string($state) ||
            !is_string($oauth['state'] ?? null) || !hash_equals($oauth['state'], $state) ||
            ($oauth['expires'] ?? 0) < now()->timestamp || !is_string($oauth['verifier'] ?? null)) {
            return $this->failure('คำขอเข้าสู่ระบบหมดอายุหรือไม่ถูกต้อง กรุณาลองใหม่');
        }
        if ($request->has('error')) return $this->failure('ยกเลิกการเข้าสู่ระบบด้วย Google แล้ว');
        $code = $request->query('code');
        if (!is_string($code) || $code === '' || strlen($code) > 4096) return $this->failure('ไม่พบรหัสยืนยันจาก Google กรุณาลองใหม่');
        try {
            $identity = $this->google->identity($code, $oauth['verifier']);
        } catch (ConnectionException | RequestException | UnexpectedValueException $exception) {
            // No provider response, code, token, client secret or personal data in logs.
            Log::warning('Frontend Google authentication failed.', ['exception_type' => get_class($exception)]);
            return $this->failure('ไม่สามารถยืนยันบัญชี Google ได้ กรุณาลองใหม่หรือใช้อีเมลและรหัสผ่าน');
        }
        $linked = FrontendUser::where('google_subject', $identity['subject'])->first();
        if ($linked) {
            if (!$linked->is_active || $linked->email !== $identity['email']) return $this->accountFailure();
            return $this->signIn($request, $linked);
        }
        $user = FrontendUser::where('email', $identity['email'])->where('is_active', true)->first();
        if (!$user || $user->google_subject !== null) return $this->accountFailure();
        // Matching email alone never links an account. Existing password is required once.
        $request->session()->put('frontend.google.pending', array_merge($identity, ['user_id' => $user->id, 'expires' => now()->addMinutes(5)->timestamp]));
        return redirect()->route('frontend.google.link');
    }

    public function showLink(Request $request)
    {
        $pending = $request->session()->get('frontend.google.pending');
        if (!$this->google->configured() || !is_array($pending) || ($pending['expires'] ?? 0) < now()->timestamp) {
            $request->session()->forget('frontend.google.pending');
            return $this->failure('คำขอเชื่อม Google หมดอายุ กรุณาเริ่มใหม่');
        }
        return view('frontend.pages.google-link', ['googleEmail' => $pending['email']]);
    }

    public function link(Request $request)
    {
        $pending = $request->session()->get('frontend.google.pending');
        if (!$this->google->configured() || !is_array($pending) || ($pending['expires'] ?? 0) < now()->timestamp) {
            $request->session()->forget('frontend.google.pending');
            return $this->failure('คำขอเชื่อม Google หมดอายุ กรุณาเริ่มใหม่');
        }
        $limiter = $this->limiter();
        $key = 'frontend:google-link:'.hash('sha256', $pending['user_id'].'|'.$request->ip());
        if ($limiter->tooManyAttempts($key, 5)) {
            $request->session()->forget('frontend.google.pending');
            return $this->failure('ลองรหัสผ่านหลายครั้งเกินไป กรุณารอสักครู่แล้วเริ่มใหม่');
        }
        $limiter->hit($key, 60);
        $data = $request->validate(['password' => ['required', 'string', 'max:4096']]);
        try {
            $user = DB::transaction(function () use ($pending, $data) {
                $user = FrontendUser::whereKey($pending['user_id'])->lockForUpdate()->first();
                if (!$user || !$user->is_active || $user->email !== $pending['email'] ||
                    ($user->google_subject !== null && $user->google_subject !== $pending['subject']) ||
                    !Hash::check($data['password'], $user->getAuthPassword())) return null;
                $user->forceFill(['google_subject' => $pending['subject']])->save();
                return $user;
            });
        } catch (QueryException $exception) {
            if (!in_array((string) $exception->getCode(), ['23000', '23505'], true)) throw $exception;
            $request->session()->forget('frontend.google.pending');
            return $this->accountFailure();
        }
        if (!$user) throw ValidationException::withMessages(['password' => 'ไม่สามารถเชื่อมบัญชีได้ กรุณาตรวจสอบรหัสผ่านหรือสอบถามผู้ดูแล']);
        $limiter->clear($key);
        return $this->signIn($request, $user);
    }

    private function signIn(Request $request, FrontendUser $user)
    {
        $request->session()->forget(['frontend.google.pending', 'frontend.google.oauth']);
        Auth::guard('frontend')->login($user);
        $request->session()->regenerate();
        $request->session()->put('frontend.password_hash', $user->getAuthPassword());
        return redirect()->route('frontend.home')->with('frontend.status', 'เข้าสู่ระบบด้วย Google สำเร็จ')->with('frontend.status_icon', 'success');
    }

    private function accountFailure()
    {
        return $this->failure('บัญชีนี้ยังไม่พร้อมเข้าสู่ระบบด้วย Google กรุณาใช้อีเมลและรหัสผ่านหรือติดต่อผู้ดูแล');
    }

    private function failure(string $message)
    {
        return redirect()->route('frontend.signin')->with('frontend.status', $message)->with('frontend.status_icon', 'error');
    }

    private function limiter(): RateLimiter
    {
        return new RateLimiter(Cache::store(config('frontend.auth_rate_limit_store', 'file')));
    }
}