<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class AuthController extends Controller
{


    public function showLogin(Request $req)
    {
        return view('auth.login');
    }
    public function login(Request $req)
    {
        return redirect('/');
    }

    public function showSignup(Request $req)
    {
        return view('auth.signup');
    }

    public function signup(Request $req)
    {
        return redirect()->route('home');
    }
}
