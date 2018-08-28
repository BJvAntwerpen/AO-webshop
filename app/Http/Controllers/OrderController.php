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
    	$orderModel = new OrderModel;
    	$clientModel = new ClientModel;

    	$clientId = $clientModel->getClient(Auth::id())->id;
    	$orders = $orderModel->getOrders($clientId);

    	return view('orders', ['orders' => $orders]);
    }

    public function orderDetails() {
    	return view('order_details');
    }

    public function orderProducts(Request $request) {
    	$orderModel = new OrderModel;
    	$clientModel = new ClientModel;
    	$shoppingCartModel = new ShoppingCartModel;

    	$clientId = $clientModel->getClient(Auth::id())->id;
    	$cart = $shoppingCartModel->getCart($request);

    	if ($orderModel->placeOrder($clientId) && $orderModel->placeOrderDetails($cart)) {
    		return redirect('orders');
    	} else {
    		return view('error');
    	}
    }
}
