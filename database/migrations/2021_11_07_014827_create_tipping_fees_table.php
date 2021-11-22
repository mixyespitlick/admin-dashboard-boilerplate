<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTippingFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipping_fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('weighin_log_id');
            $table->string('control_no');
            $table->decimal('amount_payable', 8, 2);
            $table->tinyInteger('status')->default('0');
            $table->timestamps();

            $table->foreign('weighin_log_id')->references('id')->on('weighin_logs')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipping_fees');
    }
}
