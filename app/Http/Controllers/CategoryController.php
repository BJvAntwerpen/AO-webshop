<?php

namespace App\Http\Controllers;

use App\CategoryModel;

class CategoryController extends Controller
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
     * Show the categories page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CategoryModel = new CategoryModel;

    	$categories = $CategoryModel->getAllCategories();
        
        return view('categories', ['categories' => $categories]);
    }
}
