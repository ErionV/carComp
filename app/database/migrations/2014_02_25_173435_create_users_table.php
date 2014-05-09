<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table)
		{
			$table->increments('id');
			$table->integer('dealer_id')->default(0);
			$table->string('email', 50)->unique();
			$table->string('username', 20)->unique();
			$table->string('password', 60);
			$table->string('password_temp', 60)->default('');
			$table->string('code', 30)->default('');
			$table->boolean('active', 11)->default(0);
			$table->string('remember_token', 60)->default('');
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
		Schema::drop('users');
	}

}
