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
        // test binding
        $this->app->bind(
            \App\Repositories\UserRepository::class, // abstract class
            \App\Repositories\DbUserRepository::class // concrete class (impl class)
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
