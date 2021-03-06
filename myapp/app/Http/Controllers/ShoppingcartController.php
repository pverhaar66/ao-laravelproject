<?php

namespace App\Http\Controllers;

/**
 * Description of ShoppingCart
 *
 * @author Peter Verhaar
 */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\ItemCreator;
use App\Http\ShoppingCart\ShoppingCart;

class ShoppingcartController extends Controller {
	
	
	const SHOPPINGCART = 'shoppingcart';

	/**
	 * renders the shopping cart view with shopping cart data
	 * @param Request $request
	 * @return type view
	 */
	public function index(Request $request) {
		$shoppinCartModel = new ShoppingCart();
		$total = $shoppinCartModel->calcTotalPrice($request);
		$shoppingcart = $shoppinCartModel->getShoppingCart($request);
				
		return view('shoppingcart', ['shoppingcart' => $shoppingcart, 'total' => $total]);
	}

	/**
	 * adds a product to the shoppingcart list
	 * @param Request $request
	 * @param type $articleID
	 */
	public function addToCart(Request $request) {
		$articleDetails = $_POST;
		$article = DB::table('articles')->where('article_id', $articleDetails['article_id'])->get();
		$item = new ItemCreator($article, $articleDetails['amount']);
		$shoppingCart = new ShoppingCart();
		$shoppingCart->addToCart($request, $item);
		return back();
	}

	/**
	 * removes the product from the shopping cart session array
	 * @param Request $request
	 * @param type $itemid
	 * @return type page
	 */
	public function deleteItem(Request $request, $itemid) {
		$shoppinCartModel = new ShoppingCart();
		$shoppinCartModel->deleteItem($request, $itemid);
		return back();
	}

	/**
	 * calls the empty cart function to empty the shopping cart
	 * @param Request $request
	 * @return type previous page
	 */
	public function removeAll(Request $request) {
		$shoppinCartModel = new ShoppingCart();
		$shoppinCartModel->emptyCart($request);
		return back();
	}

	public function updateItem(Request $request) {
		$article = $_POST;
		$shoppinCartModel = new ShoppingCart();
		$shoppinCartModel->updateItemAmount($request, $article);
		return back();
	}

}
