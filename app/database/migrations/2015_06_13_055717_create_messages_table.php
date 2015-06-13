<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('un_messages',function($table){
         $table->increments('id');
         $table->integer('sender_id');
         $table->integer('recipient_id');
         $table->integer('reply_to_id');
         $table->text('message');
         $table->enum('status',['read','unread']);
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
		Schema::drop('un_messages');
	}

}
