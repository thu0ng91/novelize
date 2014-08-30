<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    /*
     * TicketStatus
     */
    Schema::create('post_categories', function(Blueprint $table)
    {
      // ID's
      $table->increments('id');

      // Ticket Status Info
      $table->string('name')->unique();
      $table->text('description')->nullable();
    });
    /*
     * Tickets
     */
		Schema::create('posts', function(Blueprint $table)
		{
      // ID's
			$table->increments('id');
      $table->integer('category_id')->unsigned();

      // Ticket Info
      $table->string('title');
      $table->text('body')->nullable();

      // Foreign Keys
      $table->foreign('category_id')->references('id')->on('post_categories')->onDelete('cascade')->onUpdate('cascade');

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
    Schema::drop('post_categories');
		Schema::drop('posts');
	}

}
