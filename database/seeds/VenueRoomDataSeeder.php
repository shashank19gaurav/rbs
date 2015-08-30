<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\VenueRoom;

class VenueRoomDataSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('venue_rooms')->delete();

        //Seed data for NLH

        for ($i=1;$i<4;$i++){

            for ($j=1;$j<5;$j++) {
                $room = new VenueRoom();

                $room->venue_id = 1;
                $room->room = $i."0".$j;

                $room->save();
            }

        }

        //Seed data for AB5
        for ($i=2;$i<6;$i++){

            for ($j=1;$j<=5;$j++) {
                $room = new VenueRoom();

                $room->venue_id = 2;
                $room->room = $i."0".$j;

                $room->save();
            }
        }

    }
}
