<?php

namespace App\Http\Controllers;

class BlogController extends Controller
{
    public function postsList()
    {
        return inertia('blog/PostsList');
    }
}
