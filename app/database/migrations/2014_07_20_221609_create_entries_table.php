<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEntriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    /*
     * Entries
     */
    Schema::create('entries', function(Blueprint $table) {
      // ID's
      $table->increments('id');
      $table->integer('owner_id')->unsigned();

      // Book
      $table->string('title');
      $table->text('body');
      $table->boolean('favorite');

      // Foreign Keys
      $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

      // Timestamps
      $table->timestamps();
      $table->softDeletes();
    });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('entries');
	}

}
