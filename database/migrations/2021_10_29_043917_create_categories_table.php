<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->string('image');
            $table->timestamps();
        });
    }

            // $table->string('name');
            // $table->integer('price');
            // $table->longText('description');
            // $table->string('business_permit')->nullable();
            // $table->string('image');
            // $table->unsignedBigInteger('category_id');
            // $table->unsignedBigInteger('classification_id');
            // $table->unsignedBigInteger('contact_number');
            // $table->unsignedBigInteger('user_id');
            // $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('classification_id')->references('id')->on('classifications')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('contact_number')->references('contact_number')->on('users')->onDelete('cascade')->onUpdate('cascade');

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
