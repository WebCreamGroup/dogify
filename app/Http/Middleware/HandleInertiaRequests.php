<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'config.app.name' => config('app.name'),
            'auth.user' => fn() => $request->user()?->only(['email', 'first_name', 'last_name', 'email_verified_at']),
            'flash.toast' => fn() => session()->get('toast'),
        ]);
    }
}
