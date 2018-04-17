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
		$this->checkForDuplicates($request);
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

	/**
	 * checks the content of the session for duplicates and deletes the duplicates and adds the amount to the other to the amount of destroyed duplicates
	 * @param type $request
	 * @return type session
	 */
	public function checkForDuplicates($request) {
		$shoppingcart = $request->session()->get("shoppingcart");
		if (count($shoppingcart) > 1) {

			$articleID1 = $shoppingcart[0]->getProductOnPosition(0)->article_id;
			$articleID2 = $shoppingcart[1]->getProductOnPosition(0)->article_id;
			if ($articleID1 === $articleID2) {
				//
				$amount = $shoppingcart[0]->getAmount();
				$amount ++;
				$shoppingcart[0]->setAmount($amount);
				unset($shoppingcart[1]);
				$request->session()->put(self::SHOPPINGCART, $shoppingcart);
			} else {
				return $shoppingcart;
			}
		}
	}

}
