<?php

namespace App\Providers;

use App\Services\CheckService;
use Illuminate\Support\ServiceProvider;

class CheckServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Services\CheckService', function(){

            $url = env('CHECKS_URL');
            $user = env('CHECKS_USER');
            $pass = env('CHECKS_PASS');

            return new CheckService($url, $user, $pass);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
