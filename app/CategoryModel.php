<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryModel extends Model
{
	/**
     * Get all categories
     */
    public function getAllCategories() {
    	return DB::table('categories')->get();
    }

    /**
     * Get a category with id [id]
     */
    public function getCategory($id) {
    	return DB::table('categories')->where('id', $id)->first();
    }

    /**
     * Get product categories with category_id [id]
     */
    public function getProductCategories($id) {
    	return DB::table('products_categories')->where('category_id', $id)->get();
    }
}
