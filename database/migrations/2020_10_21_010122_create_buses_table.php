<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bus_code');
            $table->string('img');
            $table->string('from');
            $table->string('to');
            $table->string('arrival_days');
            $table->string('arrival_time');
            $table->string('fare');
            $table->string('driver_name');
            $table->boolean('status');
            $table->integer('seats');
            $table->string('maintenance')->default('no maintenance');
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
        Schema::dropIfExists('buses');
    }
}
