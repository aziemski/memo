<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class AuthController extends Controller
{

    public function login(Request $req)
    {
        return view('auth.login');
    }

    public function signup(Request $req)
    {
        return view('auth.signup');
    }
}
