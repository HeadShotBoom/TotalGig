<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGearsGigPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gears_gig', function(Blueprint $table)
		{
			$table->integer('gear_id')->unsigned()->index();
			$table->foreign('gear_id')->references('id')->on('gears')->onDelete('cascade');
			$table->integer('gig_id')->unsigned()->index();
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
		Schema::drop('gears_gig');
	}

}
