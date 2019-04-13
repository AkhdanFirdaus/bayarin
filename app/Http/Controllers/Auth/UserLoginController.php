<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class UserLoginController extends Controller
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected $username = 'username';

    protected function guard()
    {
        return Auth::guard('pelanggan');
    }

    public function showUserLoginForm()
    {
        return view('auth.userlogin');
    }

    // public function login(Request $request)
    // {
    //     if (Auth::guard('pelanggan')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
    //         return redirect()->intended('home');
    //     }
    //     return redirect()->back();    
    // }
}
