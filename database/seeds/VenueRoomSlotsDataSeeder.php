<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\VenueRoomSlot;
use App\VenueRoom;
use App\Venue;
use Carbon\Carbon;

class VenueRoomSlotsDataSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         \DB::table('venue_room_slots')->delete();


        //Things to do here -
        // 1. Seperate the logic of AB5 and NLH
        // 2.




        //Date Format YYYY-MM-DD
        //Add slot start today date here
        $startDate = Carbon::createFromDate(2016, 01, 26, 'Asia/Kolkata');

        //Add slot end date here
        $endDate = Carbon::createFromDate(2016, 01, 30, 'Asia/Kolkata');


        //Fill the slots for NLH first
        $venueRooms = VenueRoom::whereIn('venue_id', [1, 2])->get();

//        dd($venueRooms->toArray());
        //This should be in minutes
        //5:30 PM in minutes = 1050
        //7:00 PM in minutes = 1140

        $slot_time = [1050];

        //I know logic is not very efficient
        //But running short on time

        while(!$startDate->eq(($endDate))){

            echo "Start Date : ".$startDate." End Date: ".$endDate;
            foreach($venueRooms as $venueRoom) {

                foreach($slot_time as $eachSlotTime){
                    $slot = new App\VenueRoomSlot();
                    $slot->venue_room_id = $venueRoom->id;
                    $slot->date = $startDate->toDateString();
                    $slot->start_time = $eachSlotTime;
                    $slot->status = 'AV';

                    $slot->save();
                }
            }

            //Till Start Date is not equal to the end date
            $startDate->addDay();
        }

    }
}
