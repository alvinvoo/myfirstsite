<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Twitter;

class SocialServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        // this will always be registered first when framework starts
        $this->app->singleton(Twitter::class, function(){
            return new Twitter('my-key-here');
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
}
