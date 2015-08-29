<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenueRoomSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venue_room_slots', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('venue_room_id')->unsigned();
            $table->date('date');
            $table->integer('start_time');
            $table->string('status', 2)->default('AV');
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
        Schema::drop('venue_room_slots');
    }
}
