<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();

			$table->integer('from_user')->unsigned();

			$table->string('subject', 128)->nullable();
			$table->text('body')->nullable();

			$table->integer('trip_id')->unsigned();

			$table->string('type', 128);

			$table->boolean('is_read')->default(0);
			$table->dateTime('sent_at')->nullable();
			$table->timestamps();

			$table->integer('trip_request_id')->unsigned()->nullable();
			

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('from_user')->references('id')->on('users');
			$table->foreign('trip_request_id')->references('id')->on('trip_requests');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('notifications');
	}

}
