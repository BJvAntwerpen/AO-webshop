<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ClientModel extends Model
{
    protected $table = 'clients';
    public $timestamps = false;
}
