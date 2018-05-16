<?php

use Illuminate\Database\Seeder;

class categorySeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('categories')->insert(
		['category_name' => "television&audio"],
		['category_name' => "computers&laptops"],
		['category_name' => "photo&video"],
		['category_name' => "games"],
		['category_name' => "music"]
		);
	}

}
