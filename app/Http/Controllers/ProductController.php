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
    	$productCategory = DB::table('products_categories')->where('category_id', $id)->get();
    	$products = DB::table('products')->get();
        return view('products', ['products' => $products, 'productCategory' => $productCategory]);
    }
}
