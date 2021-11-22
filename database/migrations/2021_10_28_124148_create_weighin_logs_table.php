<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeighinLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weighin_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('service_provider_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('collection_point_id')->nullable();
            $table->bigInteger('or_no')->nullable();
            $table->integer('gross_weight');
            $table->integer('net_weight');
            $table->tinyInteger('status')->default('0');
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
        Schema::dropIfExists('weighin_logs');
    }
}
