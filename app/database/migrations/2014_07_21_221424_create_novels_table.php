<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNovelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    /*
     * Genres
     */
    Schema::create('genres', function(Blueprint $table) {
      // ID's
      $table->increments('id');

      // Scene Info
      $table->string('name')->unique();
      $table->text('description')->nullable();
      $table->string('image_path')->nullable();
    });
    /*
     * Novels
     */
    Schema::create('novels', function(Blueprint $table) {
      // ID's
      $table->increments('id');
      $table->integer('owner_id')->unsigned();
      $table->integer('notebook_id')->unsigned();
      $table->integer('genre_id')->unsigned();

      // Novel
      $table->string('title');
      $table->string('subtitle')->nullable();
      $table->string('author');
      $table->text('description')->nullable();
      $table->boolean('public');

      // Foreign Keys
      $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('notebook_id')->references('id')->on('notebooks')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade')->onUpdate('cascade');

      // Timestamps
      $table->timestamps();
      $table->softDeletes();
    });
    /*
     * Chapters
     */
    Schema::create('chapters', function(Blueprint $table) {
      // ID's
      $table->increments('id');
      $table->integer('novel_id')->unsigned();
      $table->integer('chapter_order')->unsigned();

      // Section Info
      $table->string('title')->nullable();

      // Foreign Keys
      $table->foreign('novel_id')->references('id')->on('novels')->onDelete('cascade')->onUpdate('cascade');

      // Timestamps
      $table->timestamps();
      $table->softDeletes();
    });
    /*
     * Scense
     */
    Schema::create('scenes', function(Blueprint $table) {
      // ID's
      $table->increments('id');
      $table->integer('chapter_id')->unsigned();
      $table->integer('scene_order')->unsigned();

      // Section Info
      $table->string('title')->nullable();
      $table->text('description')->nullable();
      $table->longText('body')->nullable();

      // Foreign Keys
      $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade')->onUpdate('cascade');

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
    Schema::drop('scenes');
    Schema::drop('chapters');
		Schema::drop('novels');
    Schema::drop('genres');
	}

}
