<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductModel extends Model
{
    public function getAllProducts(){
    	return DB::table('products')->get();
    }

    public function getProduct($id){
    	return DB::table('products')->where('id', $id)->first();
    }
}
