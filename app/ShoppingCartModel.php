<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCartModel extends Model
{
    public $cart = array();

    /**
     * Save cart to this class
     */
    public function __construct($request)
    {
        $this->cart = $request->session()->get('cart');
    }

    /**
     * Add new product to the cart
     */
    public function addProduct($product) {
        $this->cart[$product['product_id']] = $product;
    }

    /**
     * Add more to one product
     */
    public function addProductCount($product) {
        $this->cart[$product['product_id']]['quantity'] += $product['quantity'];
    }

    /**
     * Delete a product from cart
     */
    public function deleteProduct($id) {
        unset($this->cart[$id]);
    }

    /**
     * Put updated cart back into the cart
     */
    public function saveCart($request) {
    	$request->session()->put('cart', $this->cart);
    }

    /**
     * Clear the cart
     */
    public function forgetCart($request) {
    	$request->session()->forget('cart');
    }
}
