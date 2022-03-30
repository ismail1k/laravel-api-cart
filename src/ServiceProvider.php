<?php

namespace Ismail1k\LaravelCart;

use Illuminate\Support\ServiceProvider as Provider;

class ServiceProvider extends Provider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('cart', function(){
            return new Facades\Cart;
        });
        $this->app->bind('wishlist', function(){
            return new Facades\Wishlist;
        });
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations'),
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
