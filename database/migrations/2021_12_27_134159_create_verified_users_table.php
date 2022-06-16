<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifiedUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verified_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->unique()->nullable();
            // $table->foreign('users_id')->references('id')
            //                            ->on('user')
            //                            ->onDelete('cascade')
            //                            ->onUpdate('cascade');
            $table->integer('age');            
            $table->date('birthdate');
            $table->string('id_type');
            $table->string('frontOfID');        
            $table->string('backOfID');           
            $table->string('photo');        
            $table->string('brgy_clearance');
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
        Schema::dropIfExists('verified_users');
    }
}
