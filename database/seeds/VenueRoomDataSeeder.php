<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\VenueRoomSlot;
use App\VenueRoom;
use App\Venue;

class VenueRoomSlotsDataSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('venue_rooms')->delete();

        //Seed data for NLH

        //Seed data for AB5


    }
}
