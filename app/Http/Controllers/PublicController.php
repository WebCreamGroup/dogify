<?php

namespace App\Http\Controllers;

class PublicController extends Controller
{
    public function landing()
    {
        return inertia('public/Landing');
    }

    public function about()
    {
        return inertia('public/About');
    }
}
