<?php

namespace App\Http\Order;

/**
 * Description of Order
 *
 * @author peter
 */
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ClientController;

class Order {
	private $_orderID = 0;
	public function adOrderToDatabase($request) {
		$cleintController = new ClientController();
		$clientID = $cleintController->checkIfClientExists();
		if ($clientID === null) {
			return false;
		}
		$shoppingcart = $request->session()->get("shoppingcart");
		if ($shoppingcart !== null) {
			$this->newOrder();
		}
		foreach ($shoppingcart as $item) {
			DB::table('orderdetails')->insert(
				["order_id"=>$this->getOrderID(), "article_id"=>$item->getProductOnPosition(0)->article_id, "created_at"=>now(), "updated_at"=>now()]
			);
		}
		DB::table('orders')->insert(
				["order_id"=>$this->getOrderID(), "client_id"=>$clientID, "created_at"=>now(), "updated_at"=>now()]
			);
		
	}
	
	public function getOrderID() {
		return $this->_orderID;
	}

	public function newOrder() {
		return $this->_orderID++;
	}
}
