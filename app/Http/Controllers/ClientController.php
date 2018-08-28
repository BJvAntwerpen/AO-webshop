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
    	return view('add_client', ['userId' => Auth::id()]);
    }

    public function checkClient() {
    	$clientModel = new ClientModel;
    	$check = $clientModel->getClient(Auth::id());
    	if (!empty($check)) {
    		return redirect('order');
    	} else {
    		return redirect('addClient');
    	}
    }

    public function addClient() {
    	$clientModel = new ClientModel;
    	$userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    	$address = isset($_POST['address']) ? $_POST['address'] : null;
    	
    	if ($userId == null || $address == null) {
    		return view('error');
    	}

    	if (!$clientModel->addClient($userId, $address)) {
    		return view('error');
    	} else {
    		return redirect('testClient');
    	}
    }
}
