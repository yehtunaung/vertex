<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranscationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transcations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transcation_name');
            $table->unsignedBigInteger('payment_id');
            $table->foreign('payment_id', 'payment_id_fk_7531724')->references('id')->on('payment_types')->onDelete('cascade');
            $table->unsignedBigInteger('boonking_id');
            $table->foreign('boonking_id', 'boonking_id_fk_7531724')->references('id')->on('bookings')->onDelete('cascade');
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
        Schema::dropIfExists('transcations');
    }
}
