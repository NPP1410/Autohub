<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendAuthenticate
{
    public function handle(Request $request, Closure $next)
    {
        $guard = Auth::guard('frontend');
        $user = $guard->user();

        if (!$user || !$user->is_active) {
            if ($user) {
                $guard->logout();
            }
            $request->session()->forget('frontend.password_hash');
            return redirect()->route('frontend.signin');
        }

        $sessionHash = $request->session()->get('frontend.password_hash');
        if ($sessionHash !== null && !hash_equals((string) $user->getAuthPassword(), (string) $sessionHash)) {
            $guard->logout();
            $request->session()->forget('frontend.password_hash');
            return redirect()->route('frontend.signin')->with('frontend.status', 'รหัสผ่านมีการเปลี่ยนแปลง กรุณาเข้าสู่ระบบอีกครั้ง');
        }

        $request->session()->put('frontend.password_hash', $user->getAuthPassword());
        return $next($request);
    }
}
