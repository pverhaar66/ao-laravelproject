<?php
namespace App\Http;

/**
 * Description of ShoppingCart
 *
 * @author Peter Verhaar
 */
class ItemCreator extends \Illuminate\Database\Eloquent\Model {

	private $_product;
	private $_amount;

	/**
	 * 
	 * @param type $id
	 * @param type $amount
	 */
	public function __construct($product, $amount) {
		$this->_product = $product;
		$this->_amount = $amount;
	}

	public function getProduct() {
		return $this->_product;
	}

	public function getAmount() {
		return $this->_amount;
	}

	public function getProductOnPosition($pos) {
		return $this->_product[$pos];
	}

	public function setAmount($amount) {
		$this->_amount = $amount;
	}

}
