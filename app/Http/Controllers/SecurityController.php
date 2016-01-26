<?php

namespace App\Http\Controllers;

use App\Booking;
use App\VenueRoomSlot;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SecurityController extends Controller {
    public function index(){
        return view('pages.securityhome');
    }

    public function checkUpcomingBookings(){
        $bookingsData =  $this->getBookingSWF()->toArray();
//        dd($bookingsData[0]);
        return view('pages.securityupcoming')->with('bookingsData', $bookingsData);
    }

    private function getBookingSWF(){
        $twentyFourHourBeforeNow = Carbon::now('Asia/Kolkata')->subHour(24);
        $allBookings = Booking::where('approved_by_fa', 1)
//            ->where('approved_by_fa', 1)
            ->where('approved_by_swf', 1)
            ->where('approved_by_security', 0)
            ->where('disapproved_by', null)
            ->with('associatedVenueRoomSlot')
            ->with('associatedVenueRoom')
            ->get();
        return $allBookings;
    }

    public function approveBooking($id){
        $booking = Booking::where('id', $id)->first();
        $booking->approved_by_security = 1;
        $booking->save();

        return redirect('securitynewbookings');
    }

    public function disapproveBooking($id){
        $booking = Booking::where('id', $id)->first();
        $booking->approved_by_security = 0;
        $booking->disapproved_by = 'security';
        $booking->save();

        return redirect('securitynewbookings');
    }

    public function showHistory(){
        $allBookings = Booking::where('approved_by_fa', 1)
            ->where('approved_by_swf', 1)
            ->where('approved_by_security', 1)
            ->where('disapproved_by', null)
            ->with('associatedVenueRoomSlot')
            ->with('associatedVenueRoom')
            ->get();

        return view('pages.securityhistory')->with('bookingsData', $allBookings->toArray());
    }

    public function showBookingDetail($id){
        $booking = Booking::where('id', $id)
            ->with('associatedVenueRoomSlot')
            ->with('associatedVenueRoom')
            ->get();
//        dd($booking->toArray());
        return view('pages.securityhistoryshow')->with('booking', $booking->toArray());
    }

    public function checkRoomStatus(){
        return view('pages.securitystatus');
    }

    public function changeRoomShow(Request $request, $id) {
        $request->session()->put('currentBookingId', $id);
        return view('pages.securitychange');
    }

    public function changeRoom(Request $request, $slotId) {
        if ($request->session()->has('currentBookingId')) {
            $bookingId = $request->session()->get('currentBookingId');

            //Found Booking ID and Slot Id Both
            //Now Change the booking

            //Get the old slot Id - Update its status to AV
            //Make the status of new slot id as NA
            //Change the slot in the original booking object
            $booking = Booking::where('id', $bookingId)->first();
            $venueRoomSlot = VenueRoomSlot::where('id', $slotId)->first();
            if($venueRoomSlot->status=="AV"){
                //Change the booking

                $venueRoomSlot->status = "NA";
                $venueRoomSlot->save();
                //Get the old venue slot id and change its status to av

                $oldVenueRoomSlotId = $booking->venue_room_slot_id;
                $oldVenueRoomSlot = VenueRoomSlot::where('id', $oldVenueRoomSlotId)->first();

                if($oldVenueRoomSlot->status=="NA"){
                    $oldVenueRoomSlot->status="AV";
                    $oldVenueRoomSlot->save();
                    $booking->venue_room_slot_id = $slotId;
                    $booking->save();
                    return redirect('securitynewbookings');

                }

            }

            dd("NHP");
        }
    }

    public function addRemark(){
        return view('pages.securityremark');
    }

    public function addRemarkProcessRequest($id){
        $booking = Booking::where('id',$id)->first();
        $booking->security_remarks = Input::get('remark');
        $booking->save();
        return redirect('/securitynewbookings')->with('message', "Thank You ! Booking Approved");
    }

}
