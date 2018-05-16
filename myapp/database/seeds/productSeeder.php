<?php

use Illuminate\Database\Seeder;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       		DB::table('articles')->insert(
		['article_price' => "12", 'article_name'=>"HP Laptop", 'article_description'=>"niew"],
		['article_price' => "25", 'article_name'=>"Digital radio", 'article_description'=>"great for in the car with wifi"],		  
		['article_price' => "6487", 'article_name'=>"1e edition Call of Duty", 'article_description'=>" why u still play this?"],
		['article_price' => "1555", 'article_name'=>"MSI laptop", 'article_description'=>"overpriced lol"],
		['article_price' => "236", 'article_name'=>"Nikon 12 Pro 12megapixels camera", 'article_description'=>"ultra super pro and tottaly underpriced"],
		['article_price' => "202386", 'article_name'=>"bass gituar", 'article_description'=>"for bass gituarist or trying to be one"]
		);
    }
}
