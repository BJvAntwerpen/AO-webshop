<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryModel extends Model
{
    public function getAllCategories() {
    	return DB::table('categories')->get();
    }

    public function getCategory($id) {
    	return DB::table('categories')->where('id', $id)->first();
    }

    public function getProductCategories($id) {
    	return DB::table('products_categories')->where('category_id', $id)->get();
    }
}
