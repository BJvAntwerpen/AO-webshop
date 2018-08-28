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
    	$id = DB::table('orders')->insertGetId(
    		['client_id' => $id, 'order_status' => 'ordered']
		);
		return $id;
    }

    public function placeOrderDetails($cart, $id) {
    	foreach ($cart as $cartProduct) {
    		DB::table('order_details')->insert(
    			['order_id' => $id, 'product_id' => $cartProduct['product_id'], 'product_count' => $cartProduct['quantity']]
    			);
    	}
    	
    	return true;
    }
}
