<?php

namespace App\Http\Controllers;

use App\VenueRoomSlot;
use Illuminate\Http\Request;
use Input;
use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoomBookingController extends Controller
{
    public function getSlot(){

        //Slot time
        $slotTime = Input::get('time');
        $slotDate = Input::get('date');
        $venueId = Input::get('venueId');

        $slots = VenueRoomSlot::where('start_time', $slotTime)
            ->where('date', $slotDate)
            ->with('associatedRoom')
            ->whereHas('associatedRoom', function($q) use ($venueId){
                $q->where('venue_id', '=', $venueId);
            })
            ->get();

        //Floor wise data sort karna hai
        //Frontend pe dikhane ke liye


        $currentFloor = $slots->first()->associatedRoom->room[0];

        $i = 0;
        foreach($slots as $slot){
            if($slot->associatedRoom->room[0]!=$currentFloor){
                $currentFloor = $slot->associatedRoom->room[0];
                $i = $i+1;
            }
            $data['floor'][$i][] = $slot;
        }
        $response['data'] = $data;
        return json_encode($response);
    }

    public function bookSlot($slot_id){

        if($slot_id!=null){
            //1. Get user id
            //2. Get venue_slot_id
            //3. Dump all the details as JSON

            //4. Update the details for the particaular slot

            $user_id = Auth::user()->user_type;

            $slotId = $slot_id;


//            $postData =

            return json_encode(Input::all());


        }



    }
}
