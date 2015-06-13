<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('un_events',function($table){
         $table->increments('id');
         $table->string('title');
         $table->text('description');
         $table->string('slug');
         $table->dateTime('start_datetime');
         $table->dateTime('end_datetime');
         $table->string('venue');
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
		Schema::drop('un_events');
	}

}
