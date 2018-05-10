<?php

namespace App\Http\Order;

/**
 * Description of Order
 *
 * @author Peter Verhaar
 */

class Order extends \Illuminate\Database\Eloquent\Model{
		
	public function orderdetails(){
		return $this->hasMany("App\Http\Order\OrderDetail");
	}
}
