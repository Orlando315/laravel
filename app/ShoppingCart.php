<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
	//Mass assignment
	protected $fillable = ["status"];

	public function total()
	{
		return $this->products()->sum('price');
	}
  
  public function productsSize()
  {
  	return $this->products()->count();
  }

	public static function findOrCreateBySessionID($shopping_cart_id)
	{
		if($shopping_cart_id)
			//Buscar el carro de compra por el id
			return ShoppingCart::findBySession($shopping_cart_id);
		else
			//Crear el carro de compra
			return ShoppingCart::createWithoutSession($shopping_cart_id);
	}

	public static function findBySession($shopping_cart_id)
	{
		return ShoppingCart::find($shopping_cart_id);
	}

	public static function createWithoutSession()
	{
		return ShoppingCart::create([
						"status" => "incompleted"
					]);
	}

	public function inShoppingCarts(){
		return $this->hasMany('App\InShoppingCart');
	}

	public function products(){
		return $this->belongsToMany('App\Product','in_shopping_carts');
	}

	public function productsInCart(){
    $products = $this->inShoppingCarts->merge($this->products);
    return $products;
	}

}
