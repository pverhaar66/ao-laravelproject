<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\ItemCreator;

class Shoppingcart extends Model {
	
	const SHOPPINGCART = "shoppingcart";


	public function addProductToCart($request, $product) {
		$item = new ItemCreator($product[0]->article_id, 1);
		$request->session()->push( self::SHOPPINGCART, $item);
	}

}
