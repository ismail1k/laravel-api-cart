<?php

namespace Ismail1k\LaravelCart\Facades;
use DB;

class Cart
{

    public function get(String $cart_id = null){
        if($cart = DB::table('carts')->where('id', $cart_id)->first()){
            $prototype = [
                'id' => $cart->id,
                'items' => [],
            ];
            $items = DB::table('cart-items')->where('cart_id', $cart->id)->get();
            foreach($items as $item){
                $product = DB::table('products')->where('id', $item->product_id)->first();
                array_push($prototype['items'], (object)[
                    'id' => $product->id,
                    'item_id' => $item->id,
                    'inventory_id' => $product->inventory_id,
                    'unit_price' => $product->price-$product->discount,
                    'quantity' => $item->quantity,
                ]);
            }
            return (object)$prototype;
        }
        return false;
    }
    
    public function create($user_id = null, $wishlist = 0){
        $cart = DB::table('carts')->insertGetId([
            'user_id' => $user_id ? $user_id : null,
            'type' => $wishlist ? 'wishlist' : 'cart',
        ]);
        return $cart;
    }

    public function add($cart = null, $product = null, $quantity = 1){
        if($cart && $product){
            if($cart = DB::table('carts')->where('id', $cart)->first()){
                if(DB::table('cart-items')->where('cart_id', $cart->id)->where('product_id', $product)->first()){
                    DB::table('cart-items')
                    ->where('cart_id', $cart->id)
                    ->where('product_id', $product)
                    ->update(['quantity' => $quantity]);
                    return false;
                } else {
                    DB::table('cart-items')->insert([
                        'cart_id' => $cart->id,
                        'product_id' => $product,
                        'quantity' => $quantity,
                    ]);
                }
                return true;
            }
            return true;
        }
        return false;
    }

    public function removeItem($item_id = null){
        DB::table('cart-items')->delete($item_id);
        return true;
    }

    public function clear($cart_id = null){
        //Clear all items without destroy
        $cart = DB::table('carts')->where('id', $cart_id)->first();
        $items = DB::table('cart-items')->where('cart_id', $cart->id)->get();
        foreach($items as $item){
            DB::table('cart-items')->delete($item->id);
        }
        return true;
    }

    public function destroy($cart_id = null){
        //Destroy cart
        $cart = DB::table('carts')->where('id', $cart_id)->first();
        $items = DB::table('cart-items')->where('cart_id', $cart->id)->get();
        foreach($items as $item){
            DB::table('cart-items')->delete($item->id);
        }
        DB::table('carts')->delete($cart->id);
        return true;
    }

}
