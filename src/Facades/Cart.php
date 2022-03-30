<?php

namespace Ismail1k\LaravelCart\Facades;
use DB;

class Cart
{

    public function get(String $cart_id){
        if($cart_id){
            $prototype = [
                'cart_id' => $cart_id,
                'total' => $total,
                'items' => [],
            ];
            if($cart = DB::table('carts')->where('cart_id', $cart_id)->first()){
                $items = DB::table('cart-items')->where('cart_id'. $cart->id)->all();
                foreach($items as $item){
                    $product = DB::table('products')->where('product_id', $item->product_id)->first();
                    array_push($prototype['items'], [
                        'item_id' => $item->id,
                        'id' => $product->id,
                        'name' => $product->name,
                        'description' => $product->short_description,
                        'inventory_id' => $product->inventory_id,
                        'unit_price' => $product->price-$product->discount,
                        'quantity' => $item->quantity,
                    ]);
                }
            }
            return (object)$prototype;
        }
        return false;
    }

    public function add(array $product, $quantity){

        return true;
    }

    public function clear(){

        return true;
    }

}
