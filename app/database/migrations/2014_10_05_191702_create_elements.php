<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElements extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('element_type', function($table)
	    {
	        $table->increments('id');
	        $table->string('title', 128);
	        $table->integer('active');
	        $table->integer('deleted');
	        $table->timestamps();
	    });

		DB::table('element_type')->insert(
                        array(
                                array('title' => 'page','active' => 1,'deleted' => 0),
                                array('title' => 'post','active' => 1,'deleted' => 0),
                        ));

		Schema::create('elements', function($table)
	    {
	        $table->increments('id');
	        $table->integer('user_id')->unsigned();
	        $table->foreign('user_id')->references('id')->on('users');
	        $table->integer('element_type_id')->unsigned();
	        $table->foreign('element_type_id')->references('id')->on('element_type');
	        $table->string('title', 128);
	        $table->string('description', 2500);
	        $table->string('content', 5000);
	        $table->string('visability', 60);
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
		Schema::drop('element_type');
	}

}
