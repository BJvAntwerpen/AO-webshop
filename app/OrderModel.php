<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderModel extends Model
{
	public $timestamps = true;

	/**
     * Get all orders from client [id]
     */
	public function getOrders($id) {
		return DB::table('orders')->where('client_id', $id)->latest()->get();
	}

	/**
     * Get all order details from order [id]
     */
	public function getOrderDetails($id) {
		return DB::table('order_details')->where('order_id', $id)->get();
	}

	/**
     * Place an order from client [id]
     */
    public function placeOrder($id) {
    	$id = DB::table('orders')->insertGetId(
    		['client_id' => $id, 'order_status' => 'ordered', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
		);
		return $id;
    }

	/**
     * Place order details from order [id] and cart
     */
    public function placeOrderDetails($cart, $id) {
    	foreach ($cart as $cartProduct) {
    		DB::table('order_details')->insert(
    			['order_id' => $id, 'product_id' => $cartProduct['product_id'], 'product_count' => $cartProduct['quantity']]
    			);
    	}
    	
    	return true;
    }
}
