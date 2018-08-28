<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderModel extends Model
{
	protected $timestamps = true;

    public function placeOrder($id) {
    	DB::table('orders')->insert(
    		['client_id' => $id, 'order_status' => 'ordered']
		);
		return true;
    }

    public function placeOrderDetails($cart) {

    }
}
