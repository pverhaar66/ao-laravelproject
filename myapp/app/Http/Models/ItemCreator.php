<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Models;

/**
 * Description of ItemCreatorModel, Creates the items
 *
 * @author peter
 */
class ItemCreator {
	
	private $_product;
	private $_amount;
	
	/**
	 * 
	 * @param type $id
	 * @param type $amount
	 */
	public function __construct($product, $amount){
		$this->_product = $product;
		$this->_amount = $amount;
	}
	
	public function getProduct() {
		return $this->_product;
	}

	public function getAmount() {
		return $this->_amount;
	}
	
	public function getProductOnPosition($pos){
		return $this->_product[$pos];
	}
}
