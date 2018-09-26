<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductModel;
use App\ShoppingCartModel;

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
        $cartModel = new ShoppingCartModel($request);
        return view('shopping_cart', ['cart' => $cartModel->cart]);
    }

    /**
     * Add a product to the cart
     *
     * redirects back to the page you came from
     * or home if not found
     */
    public function addToCart(Request $request) {
        $ProductModel = new ProductModel;
        $cartModel = new ShoppingCartModel($request);

        $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;
        $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
        $returnTo = isset($_GET['return']) ? $_GET['return'] : 'home' ;
        $quantity = isset($_GET['quantity']) ? intval($_GET['quantity']) : 1 ;

        if ($category_id == null || $product_id == null) {
            return view('error');
        }
        $productInfo = $ProductModel->getProduct($product_id);

        $product = ['product_id' => $product_id, 'quantity' => $quantity, 'product_name' => $productInfo->product_name, 'product_desc' => $productInfo->product_description, 'product_price' => $productInfo->product_price];

        if (empty($cartModel->cart[$product_id])) {
            $cartModel->addProduct($product);
        } else {
            $cartModel->addProductCount($product);
        }

        $cartModel->saveCart($request);

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
    public function clearCart(Request $request) {
        $cartModel = new ShoppingCartModel($request);
        $cartModel->forgetCart($request);
        return redirect('cart');
    }

    /**
     * Clears one product in the cart
     *
     * redirects back to the cart
     */
    public function deleteCartItem(Request $request) {
        $cartModel = new ShoppingCartModel($request);
        $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
        if ($product_id == null) {
            return view('error');
        }

        $cartModel->deleteProduct($product_id);

        $cartModel->saveCart($request);
        return redirect('cart');
    }

    /**
     * Updates one product in the cart to
     * the new quantity
     *
     * redirects back to the cart
     */
    public function updateCartItem(Request $request) {
        $cartModel = new ShoppingCartModel($request);
        $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
        $new_quantity = isset($_GET['new_quantity']) ? intval($_GET['new_quantity']) : null;

        if ($product_id == null || $new_quantity == null) {
            return view('error');
        }

        $cartModel->cart[$product_id]['quantity'] = $new_quantity;

        $cartModel->saveCart($request);

        return redirect('cart');
    }
}
