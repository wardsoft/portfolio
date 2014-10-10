<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
	    {
	        $table->increments('id');
	        $table->string('name', 128);
	        $table->string('email');
	        $table->string('password', 60);
	        $table->string('address1', 150);
	        $table->string('address2', 150);
	        $table->string('town', 150);
	        $table->string('county', 150);
	        $table->string('postcode', 150);
	        $table->string('bio', 500);
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
