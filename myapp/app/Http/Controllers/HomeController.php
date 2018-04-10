<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ShoppingcartController;

class HomeController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index($catid = null) {
		if ($catid === null) {
			$shoppingcart = new ShoppingcartController();
			$articles = DB::table('articles')->get();
			$categories = DB::table('categories')->get();
		} else {
			$shoppingcart = new ShoppingcartController();
			$categories = DB::table('categories')->get();
			$articleIDs = DB::table("linked_articles_categories")->select("article_id")->where("category_id", $catid)->get();
			foreach ($articleIDs as $articleID) {
				$articles[] = DB::table("articles")->where("article_id", $articleID->article_id)->get();
			}
		}
		return view('home', ['articles' => $articles, 'categories' => $categories, "shoppingcart" => $shoppingcart]);
	}

}
