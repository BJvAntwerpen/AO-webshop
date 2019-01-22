<?php

namespace App;

class ShoppingCart
{
    private $cart = array();

    /**
     * Save cart to this class
     */
    public function __construct($request)
    {
        $this->cart = $request->session()->get('cart');
    }

    /**
     *Return the current cart
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Add new product to the cart
     */
    public function addProduct($productInfo, $quantity, $request)
    {    
        if (empty($this->cart[$productInfo->id])) {
            $product = ['product_id' => $productInfo->id, 'quantity' => $quantity, 'product_name' => $productInfo->product_name, 'product_desc' => $productInfo->product_description, 'product_price' => $productInfo->product_price];
            $this->cart[$productInfo->id] = $product;
        } else {
            $this->addProductCount($productInfo->id, $quantity);
        }

        $this->saveCart($request);
    }

    /**
     * Add more to one product
     */
    private function addProductCount($product_id, $quantity)
    {
        $this->cart[$product_id]['quantity'] += $quantity;
    }

    /**
     *
     */
    public function changeProductCount($product_id, $quantity, $request)
    {
        $this->cart[$product_id]['quantity'] = $quantity;
        $this->saveCart($request);
    }

    /**
     * Delete a product from cart
     */
    public function deleteProduct($id, $request)
    {
        unset($this->cart[$id]);
        $this->saveCart($request);
    }

    /**
     * Put updated cart back into the cart
     */
    private function saveCart($request)
    {
    	$request->session()->put('cart', $this->cart);
    }

    /**
     * Clear the cart
     */
    public function forgetCart($request)
    {
    	$request->session()->forget('cart');
    }
}
