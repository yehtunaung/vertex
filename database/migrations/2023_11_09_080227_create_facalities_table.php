<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facalities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('facality_type_id');
            $table->foreign('facality_type_id', 'facality_type_id_fk_7531724')->references('id')->on('facality_types')->onDelete('cascade');
            $table->string('facality_name');
            $table->string('icon')->nullable();
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
        Schema::dropIfExists('facalities');
    }
}
