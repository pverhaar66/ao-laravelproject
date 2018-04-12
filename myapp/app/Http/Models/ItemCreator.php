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
	
	private $_id;
	private $_amount;
	
	/**
	 * 
	 * @param type $id
	 * @param type $amount
	 */
	public function construct($id, $amount){
		$this->_id = $id;
		$this->_amount = $amount;
	}
}
