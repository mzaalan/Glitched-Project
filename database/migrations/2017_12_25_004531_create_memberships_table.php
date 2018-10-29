<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('stripe_id')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('memtype')->nullable();
            $table->string('card_last_four')->nullable();
            $table->timestamp('ends_at')->nullable();
        });
        
        Schema::create('memberships', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('stripe_id');
            $table->string('stripe_plan');
            $table->timestamp('ends_at')->nullable();
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
        Schema::dropIfExists('memberships');
    }
}
