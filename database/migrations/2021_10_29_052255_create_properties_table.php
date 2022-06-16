<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->longText('description');
            $table->string('business_permit')->nullable();
            $table->string('image');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')
                                          ->on('categories')
                                          ->onDelete('cascade')
                                          ->onUpdate('cascade');
            $table->unsignedBigInteger('classification_id');
            $table->foreign('classification_id')->references('id')
                                                ->on('classifications')
                                                ->onDelete('cascade')
                                                ->onUpdate('cascade');
            $table->unsignedBigInteger('phone');
            $table->foreign('phone')->references('contact_number')
                                             ->on('users')
                                             ->onDelete('cascade')
                                             ->onUpdate('cascade');
        
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
                                       ->on('users')
                                       ->onDelete('cascade')
                                       ->onUpdate('cascade');
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
        Schema::dropIfExists('properties');
    }
}
