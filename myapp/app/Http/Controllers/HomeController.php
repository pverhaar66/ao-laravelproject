<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
	public function index() {
		$articles = DB::table('articles')->get();
		return view('home', ['article' => $articles]);
	}

	public function sort($catid) {
		$articleID = DB::table("linked_articles_categories")->where("category_id", $catid)->value("article_id");
		$sortedArticle = DB::table("articles")->where("article_id", $articleID)->get();
		return view('home', ['article' => $sortedArticle]);
	}

}
