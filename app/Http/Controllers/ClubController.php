<?php

namespace App\Http\Controllers;

use App\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class ClubController extends Controller
{

    public function index()
    {
        return view('pages.clubhome');
    }

    public function bookRoom(){
        return view('pages.clubbook');
    }

    public function checkBookings(){
        $bookingsData =  $this->getBookingClub()->toArray();
//        dd($bookingsData);
        return view('pages.clubbookings')->with('bookingsData', $bookingsData);
    }

    public function showBooking($id){
        $booking = Booking::where('id', $id)
            ->with('associatedVenueRoomSlot')
            ->with('associatedVenueRoom')
            ->get();
//        dd($booking->toArray());
        return view('pages.clubbookingshow')->with('booking', $booking->toArray());
    }

    private function getBookingClub(){
        $oneMonthBeforeNow = Carbon::now('Asia/Kolkata')->subMonth(1);
        $userId = Auth::user()->id;
//        $allBookings = Booking::where('updated_at', '<=' , $twentyFourHourBeforeNow)
        $allBookings = Booking::where('user_id', $userId)
            ->where('created_at', '>', $oneMonthBeforeNow)
            ->orderBy('created_at', 'DESC')
            ->with('associatedVenueRoomSlot')
            ->with('associatedVenueRoom')
            ->get();
        return $allBookings;
    }



}
