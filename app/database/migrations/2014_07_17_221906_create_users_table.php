<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    /*
     * Roles
     */
    Schema::create('roles', function(Blueprint $table)
    {
      // ID's
      $table->increments('id');

      // Role Info
      $table->string('name')->unique();
      $table->text('description')->nullable();
    });
    /*
     * Profiles
     */
    Schema::create('profiles', function(Blueprint $table)
    {
      // ID's
      $table->increments('id');

      // Profile Info
      $table->string('first_name')->nullable();
      $table->string('last_name')->nullable();
      

      // Timestamps
      $table->timestamps();
      $table->softDeletes();
    });
    /*
     * Users
     */
		Schema::create('users', function(Blueprint $table)
		{
      // ID's
			$table->increments('id');
      $table->integer('role_id')->unsigned();
      $table->integer('profile_id')->unsigned();

      // User Info
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password', 60);
      $table->string('remember_token')->nullable();
      $table->boolean('activated');

      // Foreign Keys
      $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade')->onUpdate('cascade');

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
    Schema::drop('users');
    Schema::drop('roles');
    Schema::drop('profiles');
	}

}
