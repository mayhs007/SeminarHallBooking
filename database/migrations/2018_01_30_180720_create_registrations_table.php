<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('event_id');
            $table->integer('hall_id');
            $table->integer('club_id');
            $table->boolean('a/c');
            $table->boolean('podium_mike');
            $table->boolean('video_projector');
            $table->boolean('mike_with_card');
            $table->boolean('cordless_hand_mike');
            $table->boolean('cordless_collar_mike');
            $table->boolean('laser_pointer');
            $table->date('date_of_event');
            $table->time('start_time');
            $table->time('end_time');
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
        Schema::dropIfExists('registrations');
    }
}
