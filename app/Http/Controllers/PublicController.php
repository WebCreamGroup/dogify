<?php

namespace App\Http\Controllers;

class PublicController extends Controller
{
    public function landing()
    {
        return inertia('Public/Landing');
    }

    public function about()
    {
        return inertia('Public/About');
    }
}
