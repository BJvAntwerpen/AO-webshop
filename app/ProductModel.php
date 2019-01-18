<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductModel extends Model
{
    protected $table = 'products';

    public function categories()
    {
    	return $this->belongsToMany('App\CategoryModel', 'products_categories', 'product_id', 'category_id');
    }
}
