<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class ProductController extends Controller
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
     * Show all the products from a category.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $action = isset($_GET['action']) ? $_GET['action'] : null;
        $product_id = isset($_GET['id']) ? $_GET['id'] : null ;
        $productName = null;

        $category = Category::find($id);
        $products = $category->products()->where('category_id', $id)->get();
        if ($action != null) {
            $productName = Product::find($product_id)->product_name;
        }
        
        return view('products', ['products' => $products, 'category' => $category, 'action' => $action, 'productName' => $productName]);
    }
}
