<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\ItemCreator;
use App\Http\Controllers\HomeController;

class ShoppingcartController extends Controller {

	const SHOPPINGCART = 'shoppingcart';
	
	public function index(Request $request) {
		$shoppingcart = $request->session()->get("shoppingcart");
		echo"<pre>";
		var_dump($shoppingcart);
		exit();
		return view('shoppingcart', ['shoppingcart' => $shoppingcart]);
	}

	public function addToCart(Request $request, $productID) {
		$item = new ItemCreator($productID, 1);
		$request->session() ->push( self::SHOPPINGCART, $item);
		return back();
	}

}
