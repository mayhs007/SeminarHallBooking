<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('capacity');
            $table->string('location');
            $table->string('image');
            $table->boolean('a/c');
            $table->boolean('podium_mike');
            $table->boolean('video_projector');
            $table->boolean('mike_with_card');
            $table->boolean('cordless_hand_mike');
            $table->boolean('cordless_collar_mike');
            $table->boolean('laser_pointer');
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
        Schema::dropIfExists('halls');
    }
}
