<?php 

namespace Ismail1k\LaravelApiCart\Facades;

use Illuminate\Support\Facades\Facade;

class CartFacade extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'services.wishlist';
    }
}