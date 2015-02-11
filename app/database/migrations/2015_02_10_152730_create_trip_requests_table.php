<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('trip_requests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('trip_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->tinyInteger('status')->default(0);
			
			$table->foreign('trip_id')->references('id')->on('trips');
			$table->foreign('user_id')->references('id')->on('users');
		});	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('trip_requests');	}

}
