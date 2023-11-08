<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_rooms', function (Blueprint $table) {
       
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id', 'room_id_fk_7531724')->references('id')->on('rooms')->onDelete('cascade');
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id', 'booking_id_fk_7531724')->references('id')->on('bookings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_rooms');
    }
}
