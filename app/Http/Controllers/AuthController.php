<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // $credentials = $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        // if (Auth::guard('student')->attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->url('/students');
        // }else{
        //     return back()->withErrors(['email' => 'Invalid credentials']);
        // }
        $login = $request->login ;
        $password = $request->password ;
        $credentials = ["email" => $login , "password" => $password];
        dd(Auth::guard('student')->attempt($credentials));

        
    }

    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('auth.login');
    }
}
