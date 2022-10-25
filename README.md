# laravel-cart
A simple Shopping Cart system for e-commerce projects for Laravel.

## Installation
First, add `ismail1k/laravel-cart` package to your laravel project using Composer:
```shell
composer require "ismail1k/laravel-cart"
```
then add these follow lines to `config/app.php`:
```php
  'providers' => [
      Ismail1k\LaravelCart\ServiceProvider::class,
  ],
  'aliases' => [
      'Cart' => Ismail1k\LaravelCart\CartServiceProvider::class,
  ],
```
Next step, add some published files like migrations: 
```shell
php artisan vendor:publish --provider="Ismail1k\LaravelCart\ServiceProvider"
```
then run the follow line:
```shell
php artisan migrate
```

## Usage
Use class `Cart` using: 
```php
use Cart;
```
Select your cart with: 
```php
$cart = Cart::get($cart_token);
```
Or you can create new one with: 
```php
$cart = Cart::create($user_id = null);  //It by default null but if you want to link that created cart to a specified user, You can pass `user_id` parameter.
```
Add some product to your cart with:
```php
Cart::add($cart_token, $product_id, $quantity = 1); //The default quantity is 1, that means if you don't specify the quantity, 1 will be added automatically.
```
`Note:` If you assign 2 to a product that already has 1 quantity, it will be 2, not 3.

Remove one item from cart with:
```php
Cart::removeItem($product_id);
```
If you want to remove all products from the cart with a single action, you can do so with: 
```php
Cart:clear($cart_token);
```
Or you can destroy cart with:
```php
Cart::destroy($cart_token);
```
