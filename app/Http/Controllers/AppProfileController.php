<?php

namespace App\Http\Controllers;

class AppProfileController extends Controller
{
    public function __invoke()
    {
        return inertia('App/Profile');
    }
}
