<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clients extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('clients', function (Blueprint $table) {
			$table->increments('client_id');
			$table->integer('user_id');
			$table->string('client_name');
			$table->string('client_address');
			$table->string('client_zipcode');
			$table->string('client_province_state');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('clients');
	}

}
