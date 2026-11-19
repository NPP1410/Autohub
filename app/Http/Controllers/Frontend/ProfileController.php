<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiter;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = $request->user('frontend');
        if (is_string($request->input('email'))) {
            $request->merge(['email' => Str::lower(trim($request->input('email')))]);
        }
        $limit = $request->input('email') !== $user->email ? $this->passwordAttempt($request) : null;
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:254', Rule::unique('frontend_users')->ignore($user->id)],
            'current_password' => [Rule::requiredIf($request->input('email') !== $user->email), 'nullable', 'string', 'max:4096', 'current_password:frontend'],
            'phone' => ['nullable', 'string', 'max:30', 'regex:/^[0-9+() .\-]+$/'],
            'birth_date' => ['nullable', 'date_format:Y-m-d', 'before_or_equal:today'],
            'address' => ['nullable', 'string', 'max:1000'],
            'biography' => ['nullable', 'string', 'max:2000'],
        ]);
        // Never accept customer_id, role, status or password through profile editing.
        unset($data['current_password']);
        if ($data['email'] !== $user->email) $user->forceFill(['google_subject' => null]);
        $user->fill($data)->save();
        if ($limit) $limit[0]->clear($limit[1]);
        return redirect()->route('frontend.page', ['page' => 'edit-profile'])
            ->with('frontend.status', 'บันทึกข้อมูลโปรไฟล์เรียบร้อยแล้ว')->with('frontend.status_icon', 'success');
    }

    public function password(Request $request)
    {
        [$limiter, $key] = $this->passwordAttempt($request);
        $data = $request->validate([
            'current_password' => ['required', 'string', 'max:4096', 'current_password:frontend'],
            'password' => ['required', 'string', 'confirmed', 'different:current_password', 'max:255', Password::min(8)->letters()->numbers()],
        ]);
        $user = $request->user('frontend');
        $user->forceFill(['password' => Hash::make($data['password']), 'remember_token' => Str::random(60)])->save();
        $request->session()->put('frontend.password_hash', $user->getAuthPassword());
        $limiter->clear($key);
        $request->session()->regenerate();
        return redirect()->route('frontend.page', ['page' => 'edit-profile'])
            ->with('frontend.status', 'เปลี่ยนรหัสผ่านเรียบร้อยแล้ว')->with('frontend.status_icon', 'success');
    }
    private function passwordAttempt(Request $request): array
    {
        $limiter = new RateLimiter(Cache::store(config('frontend.auth_rate_limit_store', 'file')));
        $key = 'frontend:profile-password:'.hash('sha256', $request->user('frontend')->id.'|'.$request->ip());
        if ($limiter->tooManyAttempts($key, 5)) {
            throw ValidationException::withMessages(['current_password' => 'ลองรหัสผ่านหลายครั้งเกินไป กรุณารอสักครู่แล้วลองใหม่']);
        }
        $limiter->hit($key, 60);
        return [$limiter, $key];
    }
}