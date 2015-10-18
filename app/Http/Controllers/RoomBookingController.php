<?php

namespace App\Http\Controllers;

use App\VenueRoomSlot;
use App\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Input;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoomBookingController extends Controller
{
    public function getSlot(){

        //Slot time
//        $slotTime = Input::get('time');
        $slotDate = Carbon::parse(Input::get('date'));
        $venueId = Input::get('venueId');

        $slots = VenueRoomSlot::where('date', $slotDate)
            ->with('associatedRoom')
            ->with('associatedVenue')
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



            //Update the particular slot status to NA

            $slot  = VenueRoomSlot::find($slot_id);

            if($slot->status=='AV'){
                $slot->status = 'NA';
                $slot->save();
            }else{
                //Redirect to All Booking Page
                Redirect::to('clubbookings');
//                return "";
//                return json_encode("Could not book the room");
            }

            //TODO :: Check if user is authorized or not
            $userId = Auth::user()->id;
            $slotId = $slot_id;
            $postData = Input::all();


            $bookingDetails['registrationNumber'] = $postData['regno'];
            $bookingDetails['eventName'] = $postData['event'];
            $bookingDetails['eventDetails'] = $postData['description'];

            $booking = new Booking();
            $booking->venue_room_slot_id = $slotId;
            $booking->user_id = $userId;
            $booking->details = json_encode($bookingDetails);
            $booking->save();


            //Redirect to All Booking Page
            Redirect::to('clubbookings');
//            return "";


        }



    }

    public function getBookingSwf(){
        $twentyFourHourBeforeNow = Carbon::now('Asia/Kolkata')->subHour(24);

        $allBookings = Booking::where('updated_at', '<=' , $twentyFourHourBeforeNow)
            ->with('associatedVenueRoomSlot')
            ->with('associatedVenueRoom')
            ->get();
        return json_encode($allBookings);
    }

    public function getBookingSecurity(){
        $twentyFourHourBeforeNow = Carbon::now('Asia/Kolkata')->subHour(24);

        $allBookings = Booking::where('updated_at', '<=' , $twentyFourHourBeforeNow)
            ->with('associatedVenueRoomSlot')
            ->with('associatedVenueRoom')
            ->where('approved_by_swf','1')
            ->get();
        return json_encode($allBookings);
    }

    public function getBookingClub(){
        $twentyFourHourBeforeNow = Carbon::now('Asia/Kolkata')->subHour(24);

        $userId = Auth::user()->id;

        $allBookings = Booking::where('updated_at', '<=' , $twentyFourHourBeforeNow)
            ->with('associatedVenueRoomSlot')
            ->with('associatedVenueRoom')
            ->where('user_id', $userId)
            ->get();
        return json_encode($allBookings);
    }
}
