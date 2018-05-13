<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
    	$products = array();
    	$productCategories = DB::table('products_categories')->where('category_id', $id)->get();
    	foreach ($productCategories as $productCategory) {
    		$product = DB::table('products')->where('product_id', $productCategory->product_id)->get();
    		array_push($products, $product);
    	}
        return view('products', ['products' => $products, 'productCategories' => $productCategories]);
    }
}
