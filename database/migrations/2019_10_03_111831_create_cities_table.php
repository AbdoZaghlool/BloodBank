<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCitiesTable extends Migration {

	public function up()
	{
		Schema::create('cities', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('governorate_id')->unsigned();
			$table->string('name');
		});
	}

	public function down()
	{
		Schema::drop('cities');
	}
}