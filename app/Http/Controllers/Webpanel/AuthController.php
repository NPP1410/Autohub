<?php

namespace App\Http\Controllers\Webpanel;

use App\Http\Controllers\Controller;
use App\Models\Backend\Admin_logloginModel;
use App\Models\Backend\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Request as RequestFacade;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
    protected $prefix = 'back-end';

    public function getLogin()
    {

   
        if (Auth::guard('admin')->id() != null) {
            return redirect('webpanel');
        }

        return view("$this->prefix.auth.login", [
            'css' => [''],
            'prefix' => $this->prefix,
        ]);
    }

    public function postLogin(Request $request)
    {

    
            


        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => '422',
                'result' => 'error',
                'title' => 'Invalid login data',
                'text' => 'Please enter username and password.',
            ], 422);
        }

        $throttleKey = Str::lower((string) $request->username) . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            return response()->json([
                'status' => '429',
                'result' => 'error',
                'title' => 'Too many login attempts',
                'text' => 'Please try again in ' . RateLimiter::availableIn($throttleKey) . ' seconds.',
            ], 429);
        }

        try {
            $remember = $request->remember === 'on';


            

          

            if (Auth::guard('admin')->attempt(['email' => $request->username,'password' => $request->password], $remember)) {
                $member = AdminModel::find(Auth::guard('admin')->id());
                $this->logLogin($member, $request, $member && $member->isActive === 'Y' ? 1 : 2);

                if (!$member || $member->isActive !== 'Y') {
                    Auth::guard('admin')->logout();

                    return response()->json([
                        'status' => '500',
                        'result' => 'error',
                        'title' => 'Account disabled',
                        'text' => 'This account is not active.',
                    ], 500);
                }

                RateLimiter::clear($throttleKey);

                return response()->json([
                    'status' => '200',
                    'result' => 'success',
                    'message' => 'Login success',
                    'role' => $member->role,
                    'redirect' => url('webpanel'),
                ]);
            }

            

           
            RateLimiter::hit($throttleKey, 60);

            return response()->json([
                'status' => '500',
                'result' => 'error',
                'title' => 'Login failed',
                'text' => 'Username or password is incorrect.',
            ], 500);
        } catch (\Exception $e) {
            LogsController::logInsert($e->getLine(), url()->current(), $e->getMessage(), 'backend');

            return response()->json([
                'status' => '500',
                'result' => 'error',
                'title' => 'Something went wrong',
                'text' => 'Please try again.',
            ], 500);
        }
    }

    public function logOut()
    {
        Auth::guard('admin')->logout();

        return redirect('webpanel/login');
    }

    protected function logLogin(?AdminModel $member, Request $request, int $type): void
    {
        if (!$member) {
            return;
        }

        $logLogin = new Admin_logloginModel();
        $logLogin->admin_id = $member->id;
        $logLogin->type = $type;
        $logLogin->ip_address = RequestFacade::ip();
        $logLogin->device = $this->detectDevice($request);
        $logLogin->browser = $this->detectBrowser($request);
        $logLogin->save();
    }

    protected function detectDevice(Request $request)
    {
        $userAgent = strtolower((string) $request->userAgent());

        if ($userAgent === '') {
            return 'Unknown';
        }

        if (str_contains($userAgent, 'mobile')) {
            return 'Mobile';
        }

        if (str_contains($userAgent, 'tablet') || str_contains($userAgent, 'ipad')) {
            return 'Tablet';
        }

        return 'Desktop';
    }

    protected function detectBrowser(Request $request)
    {
        $userAgent = (string) $request->userAgent();
        $browsers = [
            'Edg/' => 'Edge',
            'OPR/' => 'Opera',
            'Chrome/' => 'Chrome',
            'Firefox/' => 'Firefox',
            'Safari/' => 'Safari',
            'MSIE ' => 'Internet Explorer',
            'Trident/' => 'Internet Explorer',
        ];

        foreach ($browsers as $needle => $browser) {
            if (str_contains($userAgent, $needle)) {
                return $browser;
            }
        }

        return $userAgent !== '' ? $userAgent : 'Unknown';
    }

    public function regiter(Request $request){

    }
}
