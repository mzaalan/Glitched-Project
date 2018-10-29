<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gender');            
            $table->string('medschool');
            $table->date('gradyear');
            $table->string('speciality')->nullable();
            // $table->string('photo');
            $table->string('add1');
            $table->string('add2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->integer('zip');
            $table->bigInteger('phone');
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('addresses');
    }
}
