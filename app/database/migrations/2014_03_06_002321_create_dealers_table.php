<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDealersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dealers', function(Blueprint $table) {
			$table->increments('id');
            $table->string('company_name', 60)->unique();
            $table->string('company_number', 60)->unique();
            $table->string('contact_number', 15)->unique();
			$table->string('post_code', 8);
			$table->text('about');
			$table->string('website', 100)->unique()->default('');
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
		Schema::drop('dealers');
	}

}
