<?php

namespace App\Http\Controllers;

class BlogController extends Controller
{
    public function blog()
    {
        return inertia('Blog');
    }
}
