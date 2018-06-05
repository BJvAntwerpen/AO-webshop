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
    public function index()
    {
        return view('shopping_cart');
    }

    public function addToCart() {
        $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : null;
        $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
        if ($category_id == null || $product_id == null) {
            return view('error');
        }

        $productModel = new ProductModel;

        $productName = $productModel->getProduct($product_id);

        return redirect('products/' . $category_id . '?action=added')->with('productName', $productName);
    }
}
