<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryModel extends Model
{
    protected $table = 'categories';

    public function products()
    {
        return $this->belongsToMany('App\ProductModel', 'products_categories', 'category_id', 'product_id');
    }
}
