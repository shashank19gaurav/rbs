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
        $allBookings = Booking::where('created_at', '<=' , $twentyFourHourBeforeNow)
//        $allBookings = Booking::where('user_id', $userId)
            ->where('approved_by_fa', 1)
            ->where('approved_by_swf', 1)
            ->where('approved_by_security', 0)
            ->with('associatedVenueRoomSlot')
            ->with('associatedVenueRoom')
            ->get();
        return $allBookings;
    }

    public function approveBooking($id){
        $booking = Booking::find( $id)->first();
        $booking->approved_by_security = 1;
        $booking->save();

        redirect('securityhistory');
    }

    public function showHistory(){
        $twentyFourHourBeforeNow = Carbon::now('Asia/Kolkata')->subHour(24);
        $allBookings = Booking::where('created_at', '<=' , $twentyFourHourBeforeNow)
//        $allBookings = Booking::where('user_id', $userId)
            ->where('approved_by_fa', 1)
            ->where('approved_by_swf', 1)
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
