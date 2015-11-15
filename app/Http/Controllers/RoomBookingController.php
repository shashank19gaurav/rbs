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
//        dd($slotDate->toDateString());
        $slots = VenueRoomSlot::where('date', $slotDate->toDateString())
            ->with('associatedRoom')
            ->with('associatedVenue')
            ->whereHas('associatedRoom', function($q) use ($venueId){
                $q->where('venue_id', '=', $venueId);
            })
            ->get();

//        dd($slots);
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

            $slot  = VenueRoomSlot::where('id', $slot_id)->first();

            //Club is only allowed to do two bookings on a day
            //First check for booking count on that day
            //If count >= 2 
            //Do not allow to book them the room

            $bookingDate = $slot->date;
            $userId = Auth::user()->id;

            $venueRoomSlotIds = VenueRoomSlot::where('date', $bookingDate)->lists('id');

            //Get all bookings off this user on the date
            //Which are not disapproved
            //When he is trying to book the room
            $bookings = Booking::where('user_id', $userId)
                        ->where('disapproved_by', null)
                        ->whereIn('venue_room_slot_id', $venueRoomSlotIds)
                        ->get();

            if(count($bookings)>=2){
                //Bookings Not Allowed 
                return("You can not book any more room on ".$bookingDate);
            }else {
                if($slot->status=='AV'){
                    $slot->status = 'NA';
                    $slot->save();
                }else{
                    //Redirect to All Booking Page
                   // return Redirect::to('clubbookings');
                   return("Could not book the room");
                }

                $slotId = $slot_id;
                $postData = Input::all();

                $bookingDetails['applicantName'] = $postData['applicantName'];
                $bookingDetails['applicantRegistrationNumber'] = $postData['applicantRegistrationNumber'];
                $bookingDetails['clubName'] = $postData['clubname'];
                $bookingDetails['contact'] = $postData['contact'];
                $bookingDetails['typeoffunction'] = $postData['typeoffunction'];
                $bookingDetails['purpose'] = $postData['purpose'];
                $bookingDetails['equipments'][] = $postData['equipmentcheckbox'];
                $bookingDetails['informationdesk'] = $postData['informationdesk'];
                $bookingDetails['audiovisual'] = $postData['audiovisual'];
                $bookingDetails['eventname'] = $postData['eventname'];
                $bookingDetails['posters'] = $postData['posters'];
                $bookingDetails['displayboard'] = $postData['displayboard'];
                $bookingDetails['banners'] = $postData['banners'];

                $booking = new Booking();
                $booking->venue_room_slot_id = $slotId;
                $booking->user_id = $userId;
                $booking->details = json_encode($bookingDetails);
                $booking->save();


                //Redirect to All Booking Page
               return Redirect::to('clubbookings');
    //            return "";
            }


            
        }
    }

    public function cancelSlot($slot_id){

        if($slot_id!=null){
            //1. Get user id
            //2. Get venue_slot_id
            //3. Dump all the details as JSON

            //4. Update the details for the particaular slot
            //Update the particular slot status to NA

            $booking = Booking::where('venue_room_slot_id', $slot_id)->first();
            if($booking->approved_by_fa==1 && $booking->approved_by_swf==1 && $booking->approved_by_security==1){
                //Can't Cancel Online
                //Go and do it manually
                $msg = 'This is booking can not cancelled online. You will have to do it manually.';
            }else{
                $slot  = VenueRoomSlot::find($slot_id);

                if($slot->status=='NA'){
                    $slot->status = 'AV';
                    $slot->save();
                    $booking->disapproved_by = 'club';
                    $booking->save();
                    $msg = 'Booking Cancelled Succesfully';
                }else{
                    $msg = 'Error Processing your Request';
                    Redirect::to('clubbookings');
                }
            }
            return view('pages.clubcancelresponse')->with('message', $msg);
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
