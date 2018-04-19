<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\ShoppingCart;

/**
 * Description of ShoppingCart
 *
 * @author peter
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
