<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompareTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('compare', function (Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->references('id')->on('users')->default(0);
			$table->integer('advert_id')->references('id')->on('advert')->default(0);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('compare');
	}

}
