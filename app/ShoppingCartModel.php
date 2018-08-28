<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCartModel extends Model
{
    /**
     * Get the cart
     */
    public function getCart($request) {
    	return $request->session()->get('cart');
    }

    /**
     * Put updated cart back into the cart
     */
    public function putCart($request, $cart) {
    	$request->session()->put('cart', $cart);
    }

    /**
     * Put new product into the cart
     */
    public function pushCart($request, $product) {
    	$request->session()->push('cart', $product);
    }

    /**
     * Clear the cart
     */
    public function forgetCart($request) {
    	$request->session()->forget('cart');
    }
}
