<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LocalizeApiMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        LaravelLocalization::setLocale($request->header('Accept-Language') ?: config('app.locale'));

        return $next($request);
    }
}
