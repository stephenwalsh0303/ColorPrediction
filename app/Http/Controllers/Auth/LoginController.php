<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login() {
        return view('auth.login');
    }

    public function loginValidate(Request $request) {
        $request->validate([
            'admin_name' => 'required|string',
            'password' => 'required|string'
        ]);
        $credentials = $request->only('admin_name', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('home');
        }
        return redirect('login')->with('msg', 'error');
    }

    public function username() {
        return 'admin_name';
    }

    public function logout() {
        Auth::logout();
        return redirect('login');
    }
}
