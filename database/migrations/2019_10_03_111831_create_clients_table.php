<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email');
			$table->string('phone');
			$table->string('password');
			$table->date('dob');
			$table->boolean('status')->default(0);
			$table->string('pin_code');
			$table->date('last_donation_date');
			$table->string('api_token',60)->unique()->nullable();
			$table->integer('blood_type_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
