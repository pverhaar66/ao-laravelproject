<?php

namespace App\Http\Controllers;

/**
 * Description of ShoppingCart
 *
 * @author Peter Verhaar
 */
use Illuminate\Http\Request;
use App\Http\Order\Order;
use App\Http\Order\OrderDetail;
use App\Http\Article\Article;

class OrderController extends Controller {

	public function index() {
		$orders = Order::where('client_id', auth()->user()->id)->get();
		$orderdetails = OrderDetail::get();
		$articles = Article::get();

		return view("orderlist", ["orderdetails" => $orderdetails, "orders" => $orders, "articles" => $articles]);
	}

	public function confirmation(Request $request) {
		$this->save($request);
		return view('order');
	}

	public function save($request) {
		$order = new Order();
		$order->client_id = auth()->user()->id;
		$order->save();
		$shoppingcart = $request->session()->get("shoppingcart");
		foreach ($shoppingcart as $item) {
			$order->orderdetails()->create([
			    "article_id" => $item->getProductOnPosition(0)->article_id,
			    "amount" => $item->getAmount()
			]);
		}
	}

}
