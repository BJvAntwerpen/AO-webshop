<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryModel;
use App\ProductModel;

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
        $CategoryModel = new CategoryModel;
        $ProductModel = new ProductModel;

        $category = $CategoryModel->getCategory($id);
    	$productCategories = $CategoryModel->getProductCategories($id);
    	$products = $ProductModel->getAllProducts();
        
        return view('products', ['products' => $products, 'productCategories' => $productCategories, 'category' => $category, 'action' => $action]);
    }
}
