<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'config.app.name' => config('app.name'),
            'auth.user' => fn() => $request->user()?->only(['email', 'first_name', 'last_name', 'email_verified_at']),
            'flash.toast' => fn() => session()->get('toast'),
            'ziggy' => fn() => (new Ziggy())->toArray(),
            'trans' => fn() => ['messages' => [LaravelLocalization::getCurrentLocale() . '.strings' => trans('*')], 'locale' => LaravelLocalization::getCurrentLocale(), 'fallback' => 'en'],
            'i18n.currentLocale' => LaravelLocalization::getCurrentLocale(),
            'i18n.locales' => fn() => collect(LaravelLocalization::getLocalesOrder())
                ->map(function (array $locale, string $code) {
                    $locale['currentUrl'] = LaravelLocalization::getLocalizedUrl($code, request()?->fullUrl());

                    return $locale;
                }),
        ]);
    }
}
