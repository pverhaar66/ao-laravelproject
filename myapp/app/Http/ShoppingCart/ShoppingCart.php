<?php

namespace App\Http\ShoppingCart;

/**
 * Description of ShoppingCart
 *
 * @author Peter Verhaar
 */
class ShoppingCart {

	const SHOPPINGCART = 'shoppingcart';
	/**
	 * adds the product to items array and the items array to the shoppingcart session
	 * @param type $request
	 * @param type $product
	 * @return type ShoppingcartSession
	 */
	function addToCart($request, $product) {
		$request->session()->push(self::SHOPPINGCART, $product);
		return self::SHOPPINGCART;
	}

}
