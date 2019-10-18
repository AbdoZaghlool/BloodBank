<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestTable extends Migration {

	public function up()
	{
		Schema::create('donation_request', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('paitant_name');
			$table->string('paitant_phone');
			$table->string('paitant_age');
			$table->integer('bags_num');
			$table->text('details');
			$table->string('hospital_name');
			$table->string('hospital_address');
			$table->decimal('longitude', 10,8)->nullable();
			$table->decimal('latitude', 10,8)->nullable();
			$table->integer('city_id')->unsigned();
			$table->integer('blood_type_id')->unsigned();
			$table->integer('client_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('donation_request');
	}
}
