<?php 

namespace Ismail1k\LaravelApiCart\Facades;

use Illuminate\Support\Facades\Facade;

class WishlistFacade extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'services/wishlist';
    }
}