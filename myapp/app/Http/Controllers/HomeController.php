<?php

namespace App\Http\Controllers;

/**
 * Description of ShoppingCart
 *
 * @author Peter Verhaar
 */
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Category\Category;
use App\Http\Article\Article;

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
		$categories = Category::get();
		if ($catid === null) {
			$articles = "Welcome To My Shop";
		} else {
			$articleIDs = DB::table("linked_articles_categories")->select("article_id")->where("category_id", $catid)->get();
			foreach ($articleIDs as $articleID) {
				$articles[] = Article::where("article_id", $articleID->article_id)->get();
			}
		}
		return view('home', ['articles' => $articles, 'categories' => $categories]);
	}

}
