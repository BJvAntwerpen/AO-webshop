<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductModel;

class ShoppingCartController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart');
        return view('shopping_cart', ['cart' => $cart]);
    }

    /**
     * Add a product to the cart
     *
     * redirects back to the page you came from
     * or home if not found
     */
    public function addToCart(Request $request) {
        $inc = false;
        $ProductModel = new ProductModel;
        $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;
        $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
        $returnTo = isset($_GET['return']) ? $_GET['return'] : 'home' ;
        $quantity = isset($_GET['quantity']) ? intval($_GET['quantity']) : 1 ;

        if ($category_id == null || $product_id == null) {
            return view('error');
        }
        $productInfo = $ProductModel->getProduct($product_id);
        $cart = $request->session()->get('cart');
        if (!empty($cart)) {
            for ($i = 0; $i < count($cart); $i++) {
                if ($cart[$i]['product_id'] == $product_id) {
                    $cart[$i]['quantity'] += $quantity;
                    $inc = true;
                    $request->session()->put('cart', $cart);
                }
            }
            if (!$inc) {
                $product = ['product_id' => $product_id, 'quantity' => $quantity, 'product_name' => $productInfo->product_name, 'product_desc' => $productInfo->product_description, 'product_price' => $productInfo->product_price];
                $request->session()->push('cart', $product);
            }
        } else {
                $product = ['product_id' => $product_id, 'quantity' => $quantity, 'product_name' => $productInfo->product_name, 'product_desc' => $productInfo->product_description, 'product_price' => $productInfo->product_price];
            $request->session()->push('cart', $product);
        }        

        $inc = false;
        if ($returnTo == 'products') {
            return redirect('products/' . $category_id . '?action=added&id=' . $product_id);
        } else if ($returnTo == 'product') {
            return redirect('product/' . $category_id . '/' . $product_id . '?action=added&quantity=' . $quantity);
        } else {
            return redirect('home');
        }
    }

    public function clearCart(Request $request) {
        $request->session()->forget('cart');
        return redirect('cart');
    }

    public function deleteCartItem(Request $request) {
        $cart = $request->session()->get('cart');
        $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
        if ($product_id == null) {
            return view('error');
        }

        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['product_id'] == $product_id) {
                array_splice($cart, $i, 1);
            }
        }
        $request->session()->put('cart', $cart);
        return redirect('cart');
    }

    public function updateCartItem(Request $request) {
        $cart = $request->session()->get('cart');
        $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
        $new_quantity = isset($_GET['new_quantity']) ? intval($_GET['new_quantity']) : null;

        if ($product_id == null || $new_quantity == null) {
            return view('error');
        }

        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['product_id'] == $product_id) {
                $cart[$i]['quantity'] = $new_quantity;
            }
        }

        $request->session()->put('cart', $cart);

        return redirect('cart');
    }
}
