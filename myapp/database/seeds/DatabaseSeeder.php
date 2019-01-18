<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('categories')->insert(
		    [
			  ['category_name' => "television&audio"],
			  ['category_name' => "computers&laptops"],
			  ['category_name' => "photo&video"],
			  ['category_name' => "games"],
			  ['category_name' => "music"]
		    ]
		);

		DB::table('linked_articles_categories')->insert(
		    [
			  ['article_id' => "1", 'category_id' => "2"], //HP Laptop
			  ['article_id' => "2", 'category_id' => "1"], //Digital radio
			  ['article_id' => "3", 'category_id' => "4"], //1e edition Call of Duty
			  ['article_id' => "4", 'category_id' => "4"], //OverWatch
			  ['article_id' => "5", 'category_id' => "2"], //MSI laptop
			  ['article_id' => "6", 'category_id' => "3"], //Nikon 12 Pro 12megapixels camera
			  ['article_id' => "7", 'category_id' => "5"], //Bass gituar
			  ['article_id' => "8", 'category_id' => "5"] //Electric gituar	  
		    ]
		);

		DB::table('articles')->insert(
		    [
			  ['article_price' => "750", 'article_name' => "HP Laptop", 'article_description' => "niew"],
			  ['article_price' => "100", 'article_name' => "Digital radio", 'article_description' => "great for in the car with wifi"],
			  ['article_price' => "75", 'article_name' => "1e edition Call of Duty", 'article_description' => " why u still play this?"],
			  ['article_price' => "75", 'article_name' => "OverWatch", 'article_description' => " Lootboxes?"],
			  ['article_price' => "1699", 'article_name' => "MSI laptop", 'article_description' => "overpriced lol"],
			  ['article_price' => "600", 'article_name' => "Nikon 12 Pro 12megapixels camera", 'article_description' => "ultra super pro and tottaly underpriced"],
			  ['article_price' => "6999", 'article_name' => "Bass gituar", 'article_description' => "for bass gituarist or trying to be one"],
			  ['article_price' => "7999", 'article_name' => "Electric gituar", 'article_description' => "METAL!!!!!"]
		    ]
		);

		DB::table('users')->insert(
		    [
			  ['name' => "John Doe", 'email' => "john_doe@live.nl", 'password' => bcrypt("123456"), 'remember_token' => str_random(60), 'created_at' => now(), 'updated_at' => now()],
			  ['name' => "Peter Verhaar", 'email' => "peter_verhaar@live.nl", 'password' => bcrypt("123456"), 'remember_token' => str_random(60), 'created_at' => now(), 'updated_at' => now()],
		    ]
		);

		DB::table('clients')->insert(
		    [
			  ['user_id' => 1, 'client_name' => "John Doe", 'client_address' => "bakkerstraat 458", 'client_zipcode' => '1687 MV', 'client_province_state' => 'Groningen', 'created_at' => now(), 'updated_at' => now()],
			  ['user_id' => 2, 'client_name' => "Peter Verhaar", 'client_address' => "azaleastraat 23", 'client_zipcode' => '2951 BB', 'client_province_state' => 'Zuid-Holland', 'created_at' => now(), 'updated_at' => now()],
		    ]
		);
	}

}
