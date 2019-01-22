<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ShoppingCart;

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
        $cart = new ShoppingCart($request);
        return view('shopping_cart', ['cart' => $cart->getCart()]);
    }

    /**
     * Add a product to the cart
     *
     * redirects back to the page you came from
     * or home if not found
     */
    public function addToCart(Request $request)
    {
        $cart = new ShoppingCart($request);

        $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;
        $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
        $returnTo = isset($_GET['return']) ? $_GET['return'] : 'home' ;
        $quantity = isset($_GET['quantity']) ? intval($_GET['quantity']) : 1 ;

        if ($category_id == null || $product_id == null) {
            return view('error');
        }

        $productInfo = Product::find($product_id);

        $cart->addProduct($productInfo, $quantity, $request);

        if ($returnTo == 'products') {
            return redirect('products/' . $category_id . '?action=added&id=' . $product_id);
        } else if ($returnTo == 'product') {
            return redirect('product/' . $category_id . '/' . $product_id . '?action=added&quantity=' . $quantity);
        } else {
            return redirect('home');
        }
    }

    /**
     * Clear the cart
     *
     * redirects back to the cart
     */
    public function clearCart(Request $request)
    {
        $cart = new ShoppingCart($request);
        $cart->forgetCart($request);
        return redirect('cart');
    }

    /**
     * Clears one product in the cart
     *
     * redirects back to the cart
     */
    public function deleteCartItem(Request $request)
    {
        $cart = new ShoppingCart($request);
        $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
        if ($product_id == null) {
            return view('error');
        }

        $cart->deleteProduct($product_id, $request);

        return redirect('cart');
    }

    /**
     * Updates one product in the cart to
     * the new quantity
     *
     * redirects back to the cart
     */
    public function updateCartItem(Request $request)
    {
        $cart = new ShoppingCart($request);
        $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
        $new_quantity = isset($_GET['new_quantity']) ? intval($_GET['new_quantity']) : null;

        if ($product_id == null || $new_quantity == null) {
            return view('error');
        }

        $cart->changeProductCount($product_id, $new_quantity, $request);

        return redirect('cart');
    }
}
