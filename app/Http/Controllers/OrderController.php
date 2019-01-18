<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\OrderModel;
use App\OrderDetailsModel;
use App\ShoppingCartModel;
use App\ClientModel;
use App\ProductModel;

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

    /*
     *Show all orders
     */
    public function index() {
        $orders = '';
    	$client = ClientModel::where('user_id', Auth::id())->first();
        if ($client != null) {
    	   $orders = OrderModel::where('client_id', $client->id)->get();
        }

    	return view('orders', ['orders' => $orders]);
    }

    /*
     *Show order details from an order
     */
    public function orderDetails($id) {
    	$orderDetails = OrderDetailsModel::where('order_id', $id)->get();
    	$products = ProductModel::all();

    	return view('order_details', ['orderDetails' => $orderDetails, 'products' => $products, 'id' => $id]);
    }

    /*
     *Order your products that are in the cart
     */
    public function orderProducts(Request $request) {
    	$shoppingCartModel = new ShoppingCartModel($request);
        $cart = $shoppingCartModel->cart;

    	$clientId = ClientModel::where('user_id', Auth::id())->first()->id;

        $order = new OrderModel;
        $order->client_id = $clientId;
        $order->order_status = 'ordered';
        $order->save();

        foreach ($cart as $product) {
            $orderDetail = new OrderDetailsModel;
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $product['product_id'];
            $orderDetail->product_count = $product['quantity'];
            $orderDetail->save();
        }
    	
    	$shoppingCartModel->forgetCart($request);
    	return redirect('orders');
    }
}
