<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ClientModel;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
    	return view('add_client');
    }

    public function checkClient()
    {
    	$clientModel = new ClientModel;
    	$check = $clientModel->getClient(Auth::id());
    	if (!empty($check)) {
    		return view('test', ['check' => 'checked']);
    	} else {
    		return redirect('addClient');
    	}
    }
}
