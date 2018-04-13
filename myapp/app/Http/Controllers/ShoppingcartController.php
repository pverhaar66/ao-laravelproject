<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\ItemCreator;
use App\Http\ShoppingCart\ShoppingCart;
use Illuminate\Support\Facades\DB;

class ShoppingcartController extends Controller {

	const SHOPPINGCART = 'shoppingcart';
	
	/**
	 * renders the shoppingcart view with shoppingcart data
	 * @param Request $request
	 * @return type view
	 */
	public function index(Request $request) {
		$shoppingcart = $request->session()->get("shoppingcart");
		return view('shoppingcart', ['shoppingcart' => $shoppingcart]);
	}

	/**
	 * adds a product to the shoppingcart list
	 * @param Request $request
	 * @param type $articleID
	 */
	public function addToCart(Request $request, $articleID) {
		$article = DB::table('articles')->where('article_id', $articleID)->get();
		$item = new ItemCreator($article, 1);
		$shoppingCart = new ShoppingCart();
		$shoppingCart->addToCart($request, $item);	
		return back();
	}

}
