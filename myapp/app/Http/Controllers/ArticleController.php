<?php

namespace App\Http\Controllers;

/**
 * Description of ArticleController
 *
 * @author Peter Verhaar
 */
use Illuminate\Support\Facades\DB;

class ArticleController {

	/**
	 * renders article view
	 */
	public function index($articleID) {
		$article = DB::table('articles')->where('article_id', $articleID)->get();
		
		return view('article', ["article" =>$article]);
	}
}
