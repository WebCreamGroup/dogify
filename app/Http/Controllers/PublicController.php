<?php

namespace App\Http\Controllers;

class PublicController extends Controller
{
    public function landing()
    {
        return inertia('Landing');
    }

    public function about()
    {
        return inertia('About');
    }
}
