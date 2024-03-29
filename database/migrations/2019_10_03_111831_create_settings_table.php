<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('notifications_settings_text');
			$table->text('about_app');
			$table->string('phone');
			$table->string('email');
			$table->string('fb_url');
			$table->string('tw_url');
			$table->string('insta_url');
			$table->string('youTube_url');
			$table->string('whatsApp_url');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}