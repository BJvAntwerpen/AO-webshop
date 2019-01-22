<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'order_details';
    public $timestamps = false;

    public function orders()
    {
    	return $this->belongsTo('App\Order');
    }
}
