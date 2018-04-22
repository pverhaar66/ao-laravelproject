<?php

namespace App\Http\Client;

/**
 * Description of Client
 *
 * @author peter
 */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Client {

	public function checkDatabaseForClient() {
		$userID = DB::table('users')->select("id")->where("id", auth()->user()->id)->first();
		$clientID = DB::table('clients')->select("client_id")->where("user_id", $userID->id)->first();
		
		return $clientID;
	}

}
