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
Route::get('/slots', 'RoomBookingController@getSlot');
Route::get('/swfbookings', 'RoomBookingController@getBookingSwf');
Route::get('/dumpclubbookings', 'RoomBookingController@getBookingClub');
Route::get('/securitybookings', 'RoomBookingController@getBookingSecurity');

Route::group(array('before' => 'auth'), function(){
    Route::group(['middleware' => 'App\Http\Middleware\ClubMiddleware'], function()
    {
        Route::get('/clubhome', 'ClubController@index');
        Route::get('/clubbook', 'ClubController@bookRoom');
        Route::get('/clubbookings', 'ClubController@checkBookings');
        Route::get('/clubbookings/{id}', 'ClubController@showBooking');
        Route::get('/clubbook/book/{slotID}', function(){
            return view('pages.bookroom');
        });
        Route::post('/clubbook/book/{slotID}', ['as' => 'book_slot', 'uses' => 'RoomBookingController@bookSlot']);
        Route::get('/clubcancel/{slotID}', ['as' => 'book_slot', 'uses' => 'RoomBookingController@cancelSlot']);
    });

    Route::group(['middleware' => 'App\Http\Middleware\SecurityMiddleware'], function() {
        //Security Routes
        Route::get('/securityhome', 'SecurityController@index');
        Route::get('/securitynewbookings', 'SecurityController@checkUpcomingBookings');
        Route::get('/securitystatus', 'SecurityController@checkRoomStatus');
        Route::get('/securityhistory/', 'SecurityController@showHistory');
        Route::get('/securityhistory/{id}', 'SecurityController@showBookingDetail');
        Route::get('/securityapprove/{id}', 'SecurityController@approveBooking');
        Route::get('/securitydisapprove/{id}', 'SecurityController@disapproveBooking');
        Route::get('/securityremark/{id}', 'SecurityController@addRemark');
        Route::post('/securityremark/{id}', 'SecurityController@addRemarkProcessRequest');
        Route::get('/securitychange/{bookingID}', 'SecurityController@changeRoomShow');
        Route::get('/changeroom/{newSlotID}', ['as' => 'book_slot', 'uses' => 'SecurityController@changeRoom']);

    });

    Route::group(['middleware' => 'App\Http\Middleware\SWFMiddleware'], function() {     
        //SWF Routes
        Route::get('/swfhome', 'SWFController@index');
        Route::get('/swfnewbookings', 'SWFController@checkUpcomingBookings');
        Route::get('/swfstatus', 'SWFController@checkRoomStatus');
        Route::get('/swfhistory/', 'SWFController@showHistory');
        Route::get('/swfhistory/{id}', 'SWFController@showBookingDetail');
        Route::get('/swfapprove/{id}', 'SWFController@approveBooking');
        Route::get('/swfdisapprove/{id}', 'SWFController@disapproveBooking');
        Route::get('/swfremark/{id}', 'SWFController@addRemark');
        Route::post('/swfremark/{id}', 'SWFController@addRemarkProcessRequest');
    });

    Route::group(['middleware' => 'App\Http\Middleware\FAMiddleware'], function() {
       //FA Routes
        Route::get('/fahome', 'FAController@index');
        Route::get('/fanewbookings', ['as' => 'faupcomingBookings', 'uses' => 'FAController@checkUpcomingBookings']);
        Route::get('/fastatus', 'FAController@checkRoomStatus');
        Route::get('/fahistory/', 'FAController@showHistory');
        Route::get('/fahistory/{id}', 'FAController@showBookingDetail');
        Route::get('/faapprove/{id}', 'FAController@approveBooking');
        Route::get('/fadisapprove/{id}', 'FAController@disapproveBooking');
        Route::get('/faremark/{id}', 'FAController@addRemark');
        Route::post('/faremark/{id}', 'FAController@addRemarkProcessRequest'); 
    });
    
});

//TODO:: Change logout request to POST
Route::get('/logout', 'Auth\AuthController@processLogout');
//Route::get('/logout', array('as' => 'logout', 'uses' => 'Auth\AuthController@logout'));
