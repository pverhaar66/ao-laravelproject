<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Order\Order;

class OrderController extends Controller {
	
	public function index(Request $request) {
		$order = new Order();
		$order->adOrderToDatabase($request);
		$orderlist = $shoppingcart = $request->session()->get("shoppingcart");
		
		return view('order', ['orderlist'=>$orderlist]);
	}

}
