<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('gig_id')->unsigned();
			$table->integer('user_id');
			$table->text('date');
			$table->text('total');
			$table->text('paid');
			$table->text('name');
			$table->text('client');
			$table->integer('service_package');
			$table->timestamps();
            $table->foreign('gig_id')->references('id')->on('gigs')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('invoices');
	}

}