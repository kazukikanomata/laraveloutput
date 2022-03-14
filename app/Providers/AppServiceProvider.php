<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
    // Cloud9のなごり
    // public function boot()
    // {
    //     $this->app['request']->server->set('HTTPS', 'on');
    //     //
    // }
}
