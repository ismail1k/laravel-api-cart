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
        $this->publishes([
            __DIR__.'/database/migrations/' => database_path('migrations'),
        ]);
        dd('Cart register!');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        dd('Cart boot!');
    }
}
