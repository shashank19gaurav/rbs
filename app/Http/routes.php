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
Route::get('/clublogin', array('as' => 'clubLogin', 'uses' => 'Auth\AuthController@getLogin'));
Route::post('/clublogin', array('as' => 'clubLogin', 'uses' => 'Auth\AuthController@processLogin'));


Route::get('/slots', 'RoomBookingController@getSlot');

//Move this under auth
Route::get('/clubbook/book/{slotID}', function(){
    return view('pages.bookroom');
});

Route::get('/slots', 'RoomBookingController@getSlot');
Route::post('/clubbook/book/{slotID}', ['as' => 'book_slot', 'uses' => 'RoomBookingController@bookSlot']);

Route::group(array('before' => 'auth'), function(){
    // Club Routes
    Route::get('/clubhome', 'ClubController@index');
    Route::get('/clubbook', 'ClubController@bookRoom');
    Route::get('/clubbookings', 'ClubController@checkBookings');

});

//TODO:: Change logout request to POST
Route::get('/logout', 'Auth\AuthController@processLogout');
//Route::get('/logout', array('as' => 'logout', 'uses' => 'Auth\AuthController@logout'));
