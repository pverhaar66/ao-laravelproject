<?php

namespace App\Http\ShoppingCart;

/**
 * Description of ShoppingCart
 *
 * @author Peter Verhaar
 */
class ShoppingCart {

	const SC = 'shoppingcart';
	
	/**
	 * 
	 */
	function getShoppingCart($request){
		return $request->session()->get(self::SC);
	}
	
	/**
	 * adds the product to items array and the items array to the shopping cart session
	 * @param type $request
	 * @param type $product
	 * @return type ShoppingcartSession
	 */
	function addToCart($request, $product) {
		$request->session()->push(self::SC, $product);
		$this->checkForDuplicates($request);
		return self::SC;
	}

	public function updateItemAmount($request, $article) {
		$shoppingcart = $request->session()->get(self::SC);
		foreach ($shoppingcart as $item) {
			if ($item->getProductOnPosition(0)->article_id == $article['article_id']) {
				$item->setAmount($article['amount']);
				$request->session()->put(self::SC, $shoppingcart);
			}
		}
	}

	/**
	 * calculates the total price of all the items in the shopping cart
	 * @param type $request
	 * @return integer
	 */
	public function calcTotalPrice($request) {
		$totalprice = 0;
		$shoppingcart = $request->session()->get("shoppingcart");
		if ($shoppingcart === null) {
			return "The Shoppingcart Is Empty";
		}
		foreach ($shoppingcart as $product) {
			$price = $product->getProductOnPosition(0)->article_price;
			$amount = $product->getAmount();
			$productsprice = $amount * $price;

			$totalprice += $productsprice;
		}
		return $totalprice;
	}

	/**
	 * removes the product from the shopping cart session array
	 * @param Request $request
	 * @param type $itemid
	 * @return type page
	 */
	public function deleteItem($request, $itemid) {
		$shoppingcart = $request->session()->get("shoppingcart");
		for ($i = 0; $i < count($shoppingcart); $i++) {
			$articleID = $shoppingcart[$i]->getProductOnPosition(0)->article_id;
			if ($articleID == $itemid) {
				if (count($shoppingcart) === 1) {
					$shoppingcart = null;
				} else {
					array_splice($shoppingcart, $i, 1);
				}
				$request->session()->put(self::SC, $shoppingcart);
			}
		}

		return back();
	}

	/**
	 * forgets the shopping cart session
	 * @param type $request
	 * @return type previous page
	 */
	public function emptyCart($request) {
		$request->session()->forget(self::SC);
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
							$amount += $shoppingcart[$y]->getAmount();
							$shoppingcart[$i]->setAmount($amount);
							array_splice($shoppingcart, $y, 1);
							$request->session()->put(self::SC, $shoppingcart);
						}
					}
				}
			}
		}
	}

}
