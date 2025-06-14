<?php

namespace App\Http\Controllers\Vendor\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user-panel';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('vendor.auth.login');
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);     

        $message = isset($request->access) ? 'Your profile is under approval or Your profile has been rejected, please contact PLEXPOINDIA 2024 team' : 'You are logged out';

        return redirect(route('vendor.login'))->with('messages', [
            [
                'type' => 'error',
                'title' => 'Exhibitor',
                'message' => $message,
            ],
        ]);
    }

    //defining guard for admins
    protected function guard()
    {
        return Auth::guard('vendor');
    }
}
