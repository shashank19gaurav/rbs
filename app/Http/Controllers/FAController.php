<?php

namespace App\Http\Controllers;

use App\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class FAController extends Controller {
    public function index(){
        return view('pages.fahome');
    }

    public function checkUpcomingBookings(){
        $bookingsData =  $this->getBookingFA()->toArray();
        return view('pages.faupcoming')->with('bookingsData', $bookingsData);
    }
    private function getBookingFA(){
//        $twentyFourHourBeforeNow = Carbon::now('Asia/Kolkata')->subHour(24);
//        $allBookings = Booking::where('created_at', '<=' , $twentyFourHourBeforeNow)
        $allBookings = Booking::where('approved_by_fa', 0)
            ->where('disapproved_by', null)
            ->with('associatedVenueRoomSlot')
            ->with('associatedVenueRoom')
            ->get();
        return $allBookings;
    }

    public function showHistory(){
        $allBookings = Booking::where('approved_by_fa', 1)
            ->with('associatedVenueRoomSlot')
            ->with('associatedVenueRoom')
            ->get();

        return view('pages.fahistory')->with('bookingsData', $allBookings->toArray());
    }

    public function approveBooking($id){
        $booking = Booking::where('id',$id)->first();
        $booking->approved_by_fa = 1;
        $booking->save();
//        return redirect()->route('faupcomingBookings')->with('message', "Thank You ! Booking Approved");
        return redirect('/fanewbookings')->with('message', "Thank You ! Booking Approved");
    }

    public function disapproveBooking($id){
        $booking = Booking::where('id',$id)->first();
        $booking->approved_by_fa = 0;
        $booking->disapproved_by = 'fa';
        $booking->save();
//        return redirect()->route('faupcomingBookings')->with('message', "Thank You ! Booking Approved");
        return redirect('/fanewbookings')->with('message', "Thank You ! Booking Approved");
    }

    public function addRemark(){
        return view('pages.faremark');
    }

    public function addRemarkProcessRequest($id){
        $booking = Booking::where('id',$id)->first();
        $booking->fa_remarks = Input::get('remark');
        $booking->save();
//        return redirect()->route('faupcomingBookings')->with('message', "Thank You ! Booking Approved");
        return redirect('/fanewbookings')->with('message', "Thank You ! Booking Approved");
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
