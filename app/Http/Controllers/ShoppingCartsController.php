<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ShoppingCart;

class ShoppingCartsController extends Controller
{
  public function index()
  {
  	/*$cart = new ShoppingCart;
  	$products = $cart->products();*/
  	$shopping_cart_id = \Session::get('shopping_cart_id');
		$shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

		$products = $shopping_cart->productsInCart();

		$total = $shopping_cart->total();

  	return view('store.cart',['products'=>$products,'total' => $total]);
  }
}
