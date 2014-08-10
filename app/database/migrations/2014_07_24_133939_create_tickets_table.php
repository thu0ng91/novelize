<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketsTable extends Migration {

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
    Schema::create('ticket_statuses', function(Blueprint $table)
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
		Schema::create('tickets', function(Blueprint $table)
		{
      // ID's
			$table->increments('id');
      $table->integer('customer_id')->unsigned();
      $table->integer('agent_id')->unsigned();
      $table->integer('status_id')->unsigned();

      // Ticket Info
      $table->text('problem');
      $table->text('solution')->nullable();

      // Foreign Keys
      $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('agent_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
      $table->foreign('status_id')->references('id')->on('ticket_statuses')->onDelete('cascade')->onUpdate('cascade');

      // Timestamps
			$table->timestamps();
      $table->softDeletes();
		});
    /*
     * TicketNotes
     */
    Schema::create('ticket_notes', function(Blueprint $table)
    {
      // ID's
      $table->increments('id');
      $table->integer('ticket_id')->unsigned();

      // Ticket Note Info
      $table->string('stamp');
      $table->text('note');

      // Foreign Keys
      $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade')->onUpdate('cascade');

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
    Schema::drop('ticket_notes');
		Schema::drop('tickets');
    Schema::drop('ticket_statuses');
	}

}
