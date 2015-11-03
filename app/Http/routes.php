<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/index', function () {
    return view('pages.index');
});



// Authentication routes...
Route::get('/login', array('as' => 'clubLogin', 'uses' => 'Auth\AuthController@getLogin'));
Route::post('/login', array('as' => 'clubLogin', 'uses' => 'Auth\AuthController@processLogin'));



Route::get('/slots', 'RoomBookingController@getSlot');

//Move this under auth
Route::get('/clubbook/book/{slotID}', function(){
    return view('pages.bookroom');
});

Route::get('/slots', 'RoomBookingController@getSlot');
Route::post('/clubbook/book/{slotID}', ['as' => 'book_slot', 'uses' => 'RoomBookingController@bookSlot']);

Route::get('/swfbookings', 'RoomBookingController@getBookingSwf');
Route::get('/dumpclubbookings', 'RoomBookingController@getBookingClub');
Route::get('/securitybookings', 'RoomBookingController@getBookingSecurity');

Route::group(array('before' => 'auth'), function(){
    // Club Routes
    Route::get('/clubhome', 'ClubController@index');
    Route::get('/clubbook', 'ClubController@bookRoom');
    Route::get('/clubbookings', 'ClubController@checkBookings');
    Route::get('/clubbookings/{id}', 'ClubController@showBooking');

    //SWF Routes
    Route::get('/swfhome', 'SWFController@index');
    Route::get('/swfnewbookings', 'SWFController@checkUpcomingBookings');
    Route::get('/swfstatus', 'SWFController@checkRoomStatus');
    Route::get('/swfhistory/', 'SWFController@showHistory');
    Route::get('/swfhistory/{id}', 'SWFController@showBookingDetail');
    Route::get('/swfapprove/{id}', 'SWFController@approveBooking');

    //Security Routes
    Route::get('/securityhome', 'SecurityController@index');
    Route::get('/securitynewbookings', 'SecurityController@checkUpcomingBookings');
    Route::get('/securitystatus', 'SecurityController@checkRoomStatus');
    Route::get('/securityhistory/', 'SecurityController@showHistory');
    Route::get('/securityhistory/{id}', 'SecurityController@showBookingDetail');
    Route::get('/securityapprove/{id}', 'SecurityController@approveBooking');

    //FA Routes
    Route::get('/fahome', 'FAController@index');
    Route::get('/fanewbookings', 'FAController@checkUpcomingBookings');
    Route::get('/fastatus', 'FAController@checkRoomStatus');
    Route::get('/fahistory/', 'FAController@showHistory');
    Route::get('/fahistory/{id}', 'FAController@showBookingDetail');
    Route::get('/faapprove/{id}', 'FAController@approveBooking');
});

//TODO:: Change logout request to POST
Route::get('/logout', 'Auth\AuthController@processLogout');
//Route::get('/logout', array('as' => 'logout', 'uses' => 'Auth\AuthController@logout'));
