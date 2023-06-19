<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view("auth.login", [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect()->intended('/dashboard/surat');
        }

        return back()->with('loginError', "Username / password salah");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
