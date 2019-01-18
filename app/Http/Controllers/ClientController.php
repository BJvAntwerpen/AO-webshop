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

    /*
     *Show add_client view
     */
    public function index() {
    	return view('add_client', ['userId' => Auth::id()]);
    }

    /*
     *Check if user has an adress
     */
    public function checkClient() {
        $check = ClientModel::where('user_id', Auth::id())->first();
    	if (!empty($check)) {
    		return redirect('order');
    	} else {
    		return redirect('addClient');
    	}
    }

    /*
     *add a client to database
     */
    public function addClient() {
    	$userId = isset($_POST['userId']) ? $_POST['userId'] : null;
    	$address = isset($_POST['address']) ? $_POST['address'] : null;

        $client = new ClientModel;
    	
    	if ($userId == null || $address == null) {
    		return view('error');
    	}

        $client->user_id = $userId;
        $client->user_address = $address;

        $client->save();
    	return redirect('testClient');
    }
}
