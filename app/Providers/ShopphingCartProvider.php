<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ShoppingCart;

class ShopphingCartProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      view()->composer("layouts.front",function($view){
      	$shopping_cart_id = \Session::get('shopping_cart_id');
				$shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

				\Session::put("shopping_cart_id",$shopping_cart->id);

				$view->with(["shopping_cart"=>$shopping_cart->productsSize()]);
      });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
