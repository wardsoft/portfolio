<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('collections', function($table)
	    {
	        $table->increments('id');
	        $table->integer('user_id')->unsigned();
	        $table->foreign('user_id')->references('id')->on('users');
	        $table->string('title', 128);
	        $table->string('description', 2500);
	        $table->string('visability', 60);
	        $table->integer('active');
	        $table->integer('deleted');
	        $table->timestamps();
	    });

	    Schema::create('images', function($table)
	    {
	        $table->increments('id');
	        $table->integer('user_id')->unsigned();
	        $table->foreign('user_id')->references('id')->on('users');
	        $table->integer('collection_id')->unsigned();
	        $table->foreign('collection_id')->references('id')->on('collections');
	        $table->string('title', 250);
	        $table->string('image_name', 250);
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
		Schema::drop('collections');
		Schema::drop('images');
	}

}
