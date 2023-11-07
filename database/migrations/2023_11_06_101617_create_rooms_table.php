<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('room_categories_id');
            $table->foreign('room_categories_id', 'room_categories_id_fk_7531724')->references('id')->on('room_categories')->onDelete('cascade');
            $table->integer('room_no');
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('items_id');
            $table->foreign('items_id', 'items_id_fk_7531724')->references('id')->on('items')->onDelete('cascade');
            $table->integer('total_price');
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
        Schema::dropIfExists('rooms');
    }
}
