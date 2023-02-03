<?php

namespace App\Http\Controllers;

class AppDashboardController extends Controller
{
    public function __invoke()
    {
        return inertia('app/Dashboard');
    }
}
