<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    	$categories = $CategoryModel->getAll();
        return view('categories', ['categories' => $categories]);
    }
}
