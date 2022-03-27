<?php

namespace Ismail1k\LaravelApiCart;

use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('cart', function(){
            return new Cart;
        });
        $this->app->bind('wishlist', function(){
            return new Wishlist;
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
