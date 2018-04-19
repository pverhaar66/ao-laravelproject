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

	public function deleteItem(Request $request, $itemid) {
		$shoppingcart = $request->session()->get("shoppingcart");
		echo"<pre>";
		var_dump($shoppingcart);
		exit();
		for ($i = 0; $i < count($shoppingcart); $i++) {
			$checkedid = $shoppingcart[$i]->getProductOnPosition(0)->article_id;
			if ($checkedid == $itemid) {
				unset($shoppingcart[$i]);
				$request->session()->put(self::SHOPPINGCART, $shoppingcart);
			}
		}
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
			for ($i = 0; $i < count($shoppingcart); $i++) {
				$articleID1 = $shoppingcart[$i]->getProductOnPosition(0)->article_id;
				for ($y = 1; $y < count($shoppingcart); $y++) {
					$articleID2 = $shoppingcart[$y]->getProductOnPosition(0)->article_id;
					if ($i !== $y) {
						if ($articleID1 === $articleID2) {
							$amount = $shoppingcart[$i]->getAmount();
							$amount ++;
							$shoppingcart[$i]->setAmount($amount);
							array_splice($shoppingcart, $y, $y);
							$request->session()->put(self::SHOPPINGCART, $shoppingcart);
						}
					}
				}
			}
			return $shoppingcart;
		}
	}

}
