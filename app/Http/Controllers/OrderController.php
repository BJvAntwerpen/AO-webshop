<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\OrderDetails;
use App\ShoppingCart;
use App\Client;
use App\Product;

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
    	$client = Client::where('user_id', Auth::id())->first();
        if ($client != null) {
    	   $orders = Order::where('client_id', $client->id)->get();
        }

    	return view('orders', ['orders' => $orders]);
    }

    /*
     *Show order details from an order
     */
    public function orderDetails($id) {
    	$orderDetails = OrderDetails::where('order_id', $id)->get();
    	$products = Product::all();

    	return view('order_details', ['orderDetails' => $orderDetails, 'products' => $products, 'id' => $id]);
    }

    /*
     *Order your products that are in the cart
     */
    public function orderProducts(Request $request) {
    	$ShoppingCart = new ShoppingCart($request);
        $cart = $ShoppingCart->getCart();

    	$clientId = Client::where('user_id', Auth::id())->first()->id;

        $order = new Order;
        $order->client_id = $clientId;
        $order->order_status = 'ordered';
        $order->save();

        foreach ($cart as $product) {
            $orderDetail = new OrderDetails;
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $product['product_id'];
            $orderDetail->product_count = $product['quantity'];
            $orderDetail->save();
        }
    	
    	$ShoppingCart->forgetCart($request);
    	return redirect('orders');
    }
}
