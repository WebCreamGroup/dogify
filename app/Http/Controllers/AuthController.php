<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function signIn()
    {
        return inertia('auth/SignIn');
    }

    public function signUp()
    {
        return inertia('auth/SignUp');
    }
}
