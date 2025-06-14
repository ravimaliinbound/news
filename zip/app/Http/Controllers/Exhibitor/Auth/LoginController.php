<?php

namespace App\Http\Controllers\Exhibitor\Auth;

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
    protected $redirectTo = '/dietician-panel';

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
        return view('exhibitor.auth.login');
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);

        $message = isset($request->access) ? 'Your inquiry has beed rejected, please get in touch with PLEXPOINDIA Management Team on 079-40399463, info@plexpoindia.org' : 'You are logged out';

        return redirect(route('exhibitor.login'))->with('messages', [
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
        return Auth::guard('exhibitor');
    }
}
