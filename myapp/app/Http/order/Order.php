<?php

namespace App\Http\Order;

/**
 * Description of Order
 *
 * @author Peter Verhaar
 */

class Order extends \Illuminate\Database\Eloquent\Model{
		
	protected $fillable = ['status',];
	
	public function orderdetails(){
		return $this->hasMany("App\Http\Order\OrderDetail");
	}
	
	
	
	public function updateOrder(){
		$this->fill([
		    "status" => 'arrived'
		]);
		return $this->save();
	}
}
