<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderModel extends Model
{
    protected $table = 'orders';

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetailsModel');
    }
}
