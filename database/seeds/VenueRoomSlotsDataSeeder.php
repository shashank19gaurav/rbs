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
         \DB::table('venue_room_slots')->delete();


        //Date Format YYYY-MM-DD
        //Add slot start today date here
        $startDate = Carbon::createFromDate(2015, 8, 29, 'Asia/Kolkata');

        //Add slot end date here
        $endDate = Carbon::createFromDate(2012, 9, 29, 'Asia/Kolkata');


        $venueRooms = VenueRoom::all();

        //This should be in minutes
        //5:30 PM in minutes = 1050
        //7:00 PM in minutes = 1140

        $slot_time = [1050, 1140];

        //I know logic is not very efficient
        //But running short on time

        while($startDate->diffInDays($endDate)!=-1){

            foreach($venueRooms as $venueRoom) {

                foreach($slot_time as $slot){
                    $slot = new App\VenueRoomSlot();
                    $slot->venue_room_id = $venueRooms->id;
                    $slot->date = Carbon::parse('Y-m-d', $startDate);;
                    $slot->start_time = $slot;
                    $slot->status = 'AV';

                    $slot->save();
                }
            }

            //Till Start Date is not equal to the end date
            $startDate->addDay();
        }

    }
}
