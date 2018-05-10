<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orderdetails extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('orderdetails', function (Blueprint $table) {
			$table->increments('orderdetails_id');
			$table->int('order_id');
			$table->integer('article_id');
			$table->integer('amount');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('orderdetails');
	}

}
