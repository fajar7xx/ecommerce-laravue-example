<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';


    public function login()
    {
        // if (Auth::viaRemember()) {
        //     return view('pages.dashboard');
        // }
        return view('pages.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'min:6'
        ]);
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->get('remember'))) {
            return redirect()->intended(route('dashboard'));
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function logout(){
        Auth::logout();
        // $request->session()->invalidate();
        return redirect()->route('login');
    }
}
