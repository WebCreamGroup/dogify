<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function signIn()
    {
        return inertia('Auth/SignIn');
    }

    public function signUp()
    {
        return inertia('Auth/SignUp');
    }
}
