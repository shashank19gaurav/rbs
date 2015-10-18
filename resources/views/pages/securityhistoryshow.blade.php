@extends('layouts.security')
@section('content')
    {{--{{$bookingsData}}--}}
    <div class="container" style="margin-top: 5%;">
        <h2>Booking Details</h2>
        <table class="table">
            <tbody>
{{--                <tr>{{$booking[0]['associated_venue_room']['venue_id']}}</tr>--}}
                <tr><strong>Building </strong>: @if ($booking[0]['associated_venue_room']['venue_id'] === 1)
                        {{'NLH'}}
                    @else
                        {{'AB5'}}
                    @endif</tr><br/>
                <tr><strong>Room </strong>: {{ $booking[0]['associated_venue_room']['room']}}</tr>
                <br>
                <tr><strong>Date </strong>: {{ $booking[0]['associated_venue_room_slot']['date']}}</tr>
                <br>
                <tr><strong>Registration Number </strong>: {{ json_decode($booking[0]['details'])->registrationNumber}}</tr>
                <br>
                <tr><strong>Event Name </strong>: {{ json_decode($booking[0]['details'])->eventName}}</tr>
                <br>
                <tr><strong>Details </strong>: {{ json_decode($booking[0]['details'])->eventDetails}}</tr>
                <br>

                </tr>
            </tbody>
        </table>
    </div>
@stop