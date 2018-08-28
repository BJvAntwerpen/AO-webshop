<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderModel extends Model
{
	public $timestamps = true;

	public function getOrders($id) {
		return DB::table('orders')->where('client_id', $id)->get();
	}

	public function getOrderDetails() {}

    public function placeOrder($id) {
    	DB::table('orders')->insert(
    		['client_id' => $id, 'order_status' => 'ordered']
		);
		return true;
    }

    public function placeOrderDetails($cart) {
    	$maxOrderId = DB::table('order_details')->max('order_id');
    	if (DB::table('order_details')->max('order_id') == null) {
    		$maxOrderId = 1;
    	}
    	$maxOrderId += 1;

    	foreach ($cart as $cartProduct) {
    		DB::table('order_details')->insert(
    			['order_id' => $maxOrderId, 'product_id' => $cartProduct->product_id, 'product_count' => $cartProduct->quantity]
    			);
    	}
    	
    	return true;
    }
}
/*
['order_id' => $maxOrderId, 'product_id' => $cartProduct->product_id, 'product_count' => $cartProduct->quantity]

*/