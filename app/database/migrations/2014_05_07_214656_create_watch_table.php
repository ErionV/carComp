<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWatchTable extends Migration
{
	public function up()
	{
		Schema::create('watches', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->references('id')->on('users')->default(0);
			$table->integer('advert_id')->references('id')->on('advert')->default(0);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('watches');
	}
}
