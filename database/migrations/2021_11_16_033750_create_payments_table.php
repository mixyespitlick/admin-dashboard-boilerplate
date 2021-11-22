<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tipping_fee_id')->nullable();
            $table->string('or_no');
            $table->decimal('amount_paid', 8, 2);
            $table->decimal('balance', 8, 2);
            $table->tinyInteger('is_partial')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('tipping_fee_id')->references('id')->on('tipping_fees')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
