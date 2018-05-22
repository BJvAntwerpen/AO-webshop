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
    public function index($category_id, $product_id)
    {
    	$ProductModel = new ProductModel;

    	$product = $ProductModel->getProduct($product_id);

    	return view('product_details', ['product' => $product, 'category_id' => $category_id]);
    }
}
