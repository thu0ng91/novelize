<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    Schema::create('sessions', function(Blueprint $table) {
      // ID's
      $table->increments('id');

      // Log Info
      $table->string('session_type')->nullable();
      $table->string('user_id')->nullable();
      $table->string('email_address')->nullable();

      // Timestamps
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
		Schema::drop('sessions');
	}

}
