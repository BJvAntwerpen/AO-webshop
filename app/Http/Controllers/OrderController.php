<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\OrderModel;
use App\ShoppingCartModel;
use App\ClientModel;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
    	return view('orders');
    }

    public function orderDetails() {
    	return view('order_details');
    }

    public function orderProducts() {
    	$orderModel = new OrderModel;
    	$clientModel = new ClientModel;
    	$shoppingCartModel = new ShoppingCartModel;

    	$clientId = $clientModel->getClient(Auth::id())->id;

    	if (!$orderModel->placeOrder($clientId)) {
    		return view('error');
    	} else {
    		return redirect('orders');
    	}
    }
}
