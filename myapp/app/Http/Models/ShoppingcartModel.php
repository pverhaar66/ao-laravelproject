<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingcartModel extends Model {

	private $shoppingcart = [];

	public function Index() {
		return view('shoppingcart');
	}

	public function addProductToCart($product) {
		$this->setShoppingcart($product);
	}

	public function getShoppingcart() {
		return $this->shoppingcart;
	}

	public function setShoppingcart($product) {
		$this->shoppingcart = $product;
	}

}
