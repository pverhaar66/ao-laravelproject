<?php

namespace App\Http\Client;

/**
 * Description of Client
 *
 * @author Peter Verhaar
 */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Database\Eloquent\Model;

class Client extends Model {
	
	protected $fillable = ['user_id', 'client_name', 'client_address', 'client_zipcode', 'client_province_state'];
	
}
