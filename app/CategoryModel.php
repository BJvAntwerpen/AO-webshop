<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryModel extends Model
{
    public function getAll() {
    	$categories = DB::table('categories')->get();
    	return $categories;
    }
}
