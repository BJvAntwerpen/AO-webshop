<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientModel extends Model
{
    public function getClient($id) {
    	return DB::table('clients')->where('user_id', $id)->first();
    }

    public function addClient($id, $address) {
    	DB::table('clients')->insert(
    		['user_id' => $id, 'user_address' => $address]
		);
		return true;
    }
}
