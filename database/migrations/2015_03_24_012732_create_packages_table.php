<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('package_name');
            $table->string('service_name_1')->nullable();
            $table->string('service_price_1')->nullable();
            $table->string('service_name_2')->nullable();
            $table->string('service_price_2')->nullable();
            $table->string('service_name_3')->nullable();
            $table->string('service_price_3')->nullable();
            $table->string('service_name_4')->nullable();
            $table->string('service_price_4')->nullable();
            $table->string('service_name_5')->nullable();
            $table->string('service_price_5')->nullable();
            $table->string('service_name_6')->nullable();
            $table->string('service_price_6')->nullable();
            $table->string('service_name_7')->nullable();
            $table->string('service_price_7')->nullable();
            $table->string('service_name_8')->nullable();
            $table->string('service_price_8')->nullable();
            $table->string('service_name_9')->nullable();
            $table->string('service_price_9')->nullable();
            $table->string('service_name_10')->nullable();
            $table->string('service_price_10')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('packages');
    }

}
