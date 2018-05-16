<?php

use Illuminate\Database\Seeder;

class productAndcategorylinkSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('linked_articles_categories')->insert(
			  ['article_id' => "3", 'category_id' => "1"], 
			  ['article_id' => "2", 'category_id' => "2"], 
			  ['article_id' => "5", 'category_id' => "2"], 
			  ['article_id' => "6", 'category_id' => "3"], 
			  ['article_id' => "4", 'category_id' => "4"],
			  ['article_id' => "7", 'category_id' => "5"]
		);
	}

}
