<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardinghousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boardinghouses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id')->references('id')
                                              ->on('properties')
                                              ->onDelete('cascade')
                                              ->onUpdate('cascade');
            $table->tinyInteger('bed');
            $table->tinyInteger('rooms');
            $table->tinyInteger('comfortroom');
            $table->tinyInteger('kitchen');
            $table->tinyInteger('livingroom');
            $table->tinyInteger('floor_total'); 
            $table->integer('floor_area');
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
        Schema::dropIfExists('boardinghouses');
    }
}
