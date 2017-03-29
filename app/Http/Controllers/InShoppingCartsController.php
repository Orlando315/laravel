<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\Redirect;
use App\InShoppingCart;
use App\ShoppingCart;

class InShoppingCartsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$shopping_cart_id = \Session::get('shopping_cart_id');
			$shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);

			$response = InShoppingCart::create([
				'shopping_cart_id' => $shopping_cart->id,
				'product_id' => $request->product_id,
				'qty' => $request->qty
			]);

			if($response){
				return redirect('/cart');
			}else{
				return back();
			}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
