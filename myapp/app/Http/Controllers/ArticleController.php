<?php

namespace App\Http\Controllers;

/**
 * Description of ArticleController
 *
 * @author Peter Verhaar
 */
use Illuminate\Support\Facades\DB;
use App\Http\Article\Article;

class ArticleController {

	/**
	 * renders article view
	 */
	public function index($articleID) {
		$article = Article::where('article_id', $articleID)->first();
		
		return view('article', ["article" =>$article]);
	}
}
