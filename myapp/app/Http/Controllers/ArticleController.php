<?php

namespace App\Http\Controllers;

/**
 * Description of ArticleController
 *
 * @author Peter Verhaar
 */
use App\Http\Article\Article;
use App\Http\Category\Category;

class ArticleController {

	/**
	 * renders article view
	 */
	public function index($articleID) {
		$article = Article::where('article_id', $articleID)->first();
		$categories = Category::get();
		
		return view('article', ["article" =>$article, "categories"=>$categories]);
	}
}
