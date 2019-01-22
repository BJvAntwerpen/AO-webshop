<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function categories()
    {
    	return $this->belongsToMany('App\Category', 'products_categories'/*, 'product_id', 'category_id'*/);
    }
}
