<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendUser;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLogin()
    {
        $guard = Auth::guard('frontend');
        if ($guard->check() && $guard->user()->is_active) {
            return redirect()->route('frontend.home');
        }
        if ($guard->check()) {
            $guard->logout();
        }
        return view('frontend.pages.signin');
    }

    public function login(Request $request)
    {
        $this->normalizeEmail($request);
        $data = $request->validate([
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', 'string', 'max:4096'],
            'remember' => ['nullable', 'boolean'],
        ]);

        $limiter = $this->limiter();
        $key = $this->limitKey('login', $request);
        if ($limiter->tooManyAttempts($key, 5)) {
            throw ValidationException::withMessages(['email' => 'ลองเข้าสู่ระบบหลายครั้งเกินไป กรุณารอ '.$limiter->availableIn($key).' วินาที']);
        }

        if (!Auth::guard('frontend')->attempt([
            'email' => $data['email'], 'password' => $data['password'], 'is_active' => true,
        ], $request->boolean('remember'))) {
            $limiter->hit($key, 60);
            throw ValidationException::withMessages(['email' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง หรือบัญชียังไม่พร้อมใช้งาน']);
        }

        $limiter->clear($key);
        $request->session()->regenerate();
        $request->session()->put('frontend.password_hash', Auth::guard('frontend')->user()->getAuthPassword());
        return redirect()->route('frontend.home')->with('frontend.status', 'เข้าสู่ระบบสำเร็จ')->with('frontend.status_icon', 'success');
    }

    public function logout(Request $request)
    {
        Auth::guard('frontend')->logout();
        $request->session()->forget(['frontend.password_hash', 'frontend.status', 'frontend.google']);
        // Preserve any concurrent admin login; do not invalidate the whole session.
        $request->session()->regenerate();
        return redirect()->route('frontend.signin')->with('frontend.status', 'ออกจากระบบแล้ว')->with('frontend.status_icon', 'success');
    }

    public function showForgotPassword()
    {
        return view('frontend.pages.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $this->normalizeEmail($request);
        $data = $request->validate(['email' => ['required', 'email', 'max:254']]);
        $limiter = $this->limiter();
        $key = $this->limitKey('password-email', $request);
        $ipKey = 'frontend:password-email-ip:'.hash('sha256', (string) $request->ip());

        if ($limiter->tooManyAttempts($key, 3) || $limiter->tooManyAttempts($ipKey, 10)) {
            throw ValidationException::withMessages(['email' => 'ส่งคำขอหลายครั้งเกินไป กรุณารอสักครู่แล้วลองใหม่']);
        }
        $limiter->hit($key, 60);
        $limiter->hit($ipKey, 60);

        try {
            Password::broker('frontend')->sendResetLink(['email' => $data['email'], 'is_active' => true]);
        } catch (\Symfony\Component\Mailer\Exception\TransportExceptionInterface $exception) {
            Log::warning('Frontend password reset email delivery failed.', ['exception_type' => get_class($exception)]);
        }

        // Same response for known, unknown, inactive and recently notified accounts.
        return redirect()->route('frontend.password.request')->with(
            'frontend.status', 'หากอีเมลนี้มีบัญชีที่ใช้งานได้ ระบบจะส่งลิงก์ตั้งรหัสผ่านใหม่ให้ กรุณาตรวจกล่องจดหมายและอีเมลขยะ'
        );
    }

    public function showResetPassword(Request $request, string $token)
    {
        return view('frontend.pages.reset-password', ['token' => $token, 'email' => (string) $request->query('email', '')]);
    }

    public function resetPassword(Request $request)
    {
        $this->normalizeEmail($request);
        $data = $request->validate([
            'token' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', 'string', 'confirmed', 'max:255', PasswordRule::min(8)->letters()->numbers()],
        ]);

        $limiter = $this->limiter();
        $key = $this->limitKey('password-reset', $request);
        if ($limiter->tooManyAttempts($key, 5)) {
            throw ValidationException::withMessages(['email' => 'ลองตั้งรหัสผ่านหลายครั้งเกินไป กรุณารอสักครู่']);
        }
        $limiter->hit($key, 60);

        $status = Password::broker('frontend')->reset(
            array_merge($data, ['is_active' => true]),
            function (FrontendUser $user, string $password) {
                $user->forceFill(['password' => Hash::make($password), 'remember_token' => Str::random(60)])->save();
                event(new PasswordReset($user));
            }
        );

        if ($status !== Password::PASSWORD_RESET) {
            throw ValidationException::withMessages(['email' => 'ลิงก์ไม่ถูกต้อง หมดอายุ หรือถูกใช้แล้ว กรุณาขอลิงก์ใหม่']);
        }

        $limiter->clear($key);
        return redirect()->route('frontend.signin')->with('frontend.status', 'เปลี่ยนรหัสผ่านสำเร็จ กรุณาเข้าสู่ระบบด้วยรหัสผ่านใหม่');
    }

    protected function normalizeEmail(Request $request): void
    {
        if (is_string($request->input('email'))) {
            $request->merge(['email' => Str::lower(trim($request->input('email')))]);
        }
    }

    protected function limiter(): RateLimiter
    {
        return new RateLimiter(Cache::store(config('frontend.auth_rate_limit_store', 'file')));
    }

    protected function limitKey(string $action, Request $request): string
    {
        return 'frontend:'.$action.':'.hash('sha256', (string) $request->input('email').'|'.$request->ip());
    }
}
