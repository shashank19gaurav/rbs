<?php

namespace App\Http\Controllers;

use App\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FAController extends Controller {
    public function index(){
        return view('pages.fahome');
    }

    public function checkUpcomingBookings(){
        $bookingsData =  $this->getBookingFA()->toArray();
        return view('pages.faupcoming')->with('bookingsData', $bookingsData);
    }
    private function getBookingFA(){
        $twentyFourHourBeforeNow = Carbon::now('Asia/Kolkata')->subHour(24);
        $allBookings = Booking::where('created_at', '<=' , $twentyFourHourBeforeNow)
            ->where('approved_by_fa', 0)
            ->with('associatedVenueRoomSlot')
            ->with('associatedVenueRoom')
            ->get();
        return $allBookings;
    }

    public function showHistory(){
        $twentyFourHourBeforeNow = Carbon::now('Asia/Kolkata')->subHour(24);
        $allBookings = Booking::where('created_at', '<=' , $twentyFourHourBeforeNow)
            ->with('associatedVenueRoomSlot')
            ->with('associatedVenueRoom')
            ->get();

        return view('pages.fahistory')->with('bookingsData', $allBookings->toArray());
    }

    public function approveBooking($id){
        $booking = Booking::find( $id)->first();
        $booking->approved_by_security = 1;
        $booking->save();

        redirect('fahistory');
    }

    public function showBookingDetail($id){
        $booking = Booking::where('id', $id)
            ->with('associatedVenueRoomSlot')
            ->with('associatedVenueRoom')
            ->get();
//        dd($booking->toArray());
        return view('pages.fahistoryshow')->with('booking', $booking->toArray());
    }

    public function checkRoomStatus(){
        return view('pages.swfstatus');
    }

}
