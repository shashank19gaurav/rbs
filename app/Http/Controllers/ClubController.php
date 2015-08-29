<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        return view('pages.clubbookings');
    }



}
