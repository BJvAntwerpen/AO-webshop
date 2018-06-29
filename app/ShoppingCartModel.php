<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCartModel extends Model
{
    public function getCart($request) {
    	return $request->session()->get('cart');
    }

    public function putCart($request, $cart) {
    	$request->session()->put('cart', $cart);
    }

    public function pushCart($request, $product) {
    	$request->session()->push('cart', $product);
    }

    public function forgetCart($request) {
    	$request->session()->forget('cart');
    }
}
