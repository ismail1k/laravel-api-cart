# laravel-cart
A simple Shopping Cart system for e-commerce projectsc Compatible with Laravel API.

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
      'Wishlist' => Ismail1k\LaravelCart\Facades\CartFacade::class,
  ],
```
Next step, add some published files like migrations: 
```shell
php artisan vendor:publish --provider="Ismail1k\LaravelCart\CartServiceProvider"
```
then run the follow line:
```shell
php artisan migrate
```

## Usage
