<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSites extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sites', function($table)
	    {
	        $table->increments('id');
	        $table->integer('user_id')->unsigned();
	        $table->foreign('user_id')->references('id')->on('users');
	        $table->string('title', 128);
	        $table->string('href', 128);
	        $table->integer('active');
	        $table->integer('deleted');
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
		Schema::drop('elements');
	}

}
