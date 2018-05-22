<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductModel;
use App\CategoryModel;

class ProductDetailsController extends Controller
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
     * Show all the info for a product.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
    	$ProductModel = new ProductModel;
    	$product = $ProductModel->getProduct($id);
    	return view('product_details', ['product' => $product]);
    }
}
