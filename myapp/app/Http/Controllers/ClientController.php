<?php

namespace App\Http\Controllers;

/**
 * Description of ClientController
 *
 * @author peter
 */
use App\Http\Client\Client;

class ClientController extends Controller {

	public function checkIfClientExists() {
		$client = new client();
		$clientID = $client->checkDatabaseForClient();
		if ($clientID === null) {
			return view('client', ['controller' => $this]);
		}
	}
	
	public function addClient(){
		echo"<pre>";
		var_dump($_POST);
		exit();
	}
}
