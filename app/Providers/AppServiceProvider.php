<?php

namespace App\Providers;

use Closure;
use Illuminate\Support\ServiceProvider;
use Inertia\ResponseFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ResponseFactory::macro('modal', function ($component, array $props = [], Closure $baseController = null) {
            $modal = ['component' => $component, 'props' => $props];

            if (request()?->ajax()) {
                return response()->json(['modal' => $modal]);
            }

            if ($baseController) {
                inertia()->share(['modal' => $modal]);

                return $baseController();
            }

            abort(404);
        });
    }
}
