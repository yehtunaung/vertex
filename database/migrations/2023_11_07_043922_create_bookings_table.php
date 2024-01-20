<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string("phone");
            $table->string('adults');
            $table->string('children');
            $table->dateTime('booking_time');
            $table->dateTime('check_in_time');
            $table->dateTime('check_out_time');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *ာ
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
