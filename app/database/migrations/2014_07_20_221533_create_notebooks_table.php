<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotebooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        /*
         * Notebooks
         */
        Schema::create('notebooks', function(Blueprint $table) {
            // ID's
            $table->increments('id');
            $table->integer('owner_id')->unsigned();

            // Notebook
            $table->string('name');
            $table->text('description')->nullable();

            // Foreign Keys
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            // Timestamps
            $table->timestamps();
            $table->softDeletes();
        });
        /*
         * Characters
         */
        Schema::create('characters', function(Blueprint $table) {
            // ID's
            $table->increments('id');
            $table->integer('notebook_id')->unsigned();

            // Character Info
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('dob')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('skin_color')->nullable();

            // Foreign Keys
            $table->foreign('notebook_id')->references('id')->on('notebooks')->onDelete('cascade')->onUpdate('cascade');

            // Timestamps
            $table->timestamps();
            $table->softDeletes();
        });
        /*
         * Locations
         */
        Schema::create('locations', function(Blueprint $table) {
            // ID's
            $table->increments('id');
            $table->integer('notebook_id')->unsigned();

            // Location Info
            $table->string('name');
            $table->text('description')->nullable();

            // Foreign Keys
            $table->foreign('notebook_id')->references('id')->on('notebooks')->onDelete('cascade')->onUpdate('cascade');

            // Timestamps
            $table->timestamps();
            $table->softDeletes();
        });
        /*
         * Items
         */
        Schema::create('items', function(Blueprint $table) {
            // ID's
            $table->increments('id');
            $table->integer('notebook_id')->unsigned();

            // Item Info
            $table->string('name');
            $table->text('description')->nullable();

            // Foreign Keys
            $table->foreign('notebook_id')->references('id')->on('notebooks')->onDelete('cascade')->onUpdate('cascade');

            // Timestamps
            $table->timestamps();
            $table->softDeletes();
        });
        /*
         * Notes
         */
        Schema::create('notes', function(Blueprint $table) {
            // ID's
            $table->increments('id');
            $table->integer('notebook_id')->unsigned();

            // Note Info
            $table->string('name');
            $table->text('description')->nullable();

            // Foreign Keys
            $table->foreign('notebook_id')->references('id')->on('notebooks')->onDelete('cascade')->onUpdate('cascade');

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
		Schema::drop('notes');
        Schema::drop('items');
        Schema::drop('locations');
        Schema::drop('characters');
        Schema::drop('notebooks');
	}

}
