<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseandlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houseandlots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id')->references('id')
                                          ->on('properties')
                                          ->onDelete('cascade')
                                          ->onUpdate('cascade');
            $table->tinyInteger('bedroom');
            $table->tinyInteger('comfortroom');
            $table->tinyInteger('kitchen');
            $table->tinyInteger('livingroom');
            $table->tinyInteger('floor_area');
            $table->tinyInteger('floor_total'); 
            $table->tinyInteger('parking_lot');
            $table->float('land_size',5 ,2);
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
        Schema::dropIfExists('houseandlots');
    }
}
