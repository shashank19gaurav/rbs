<?php

namespace App\Http\Controllers;

use App\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

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
        return view('pages.swfstatus');
    }
}
