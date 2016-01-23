@extends('layouts.club')
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
                <tr><strong>Club Name </strong>: {{ json_decode($booking[0]['details'])->clubName}}</tr>
                <br>
                <tr><strong>Applicant Name </strong>: {{ json_decode($booking[0]['details'])->applicantName}}</tr>
                <br>
                <tr><strong>Registration Number </strong>: {{ json_decode($booking[0]['details'])->applicantRegistrationNumber}}</tr>
                <br>
                <tr><strong>Contact </strong>: {{ json_decode($booking[0]['details'])->contact}}</tr>
                <br>
                <tr><strong>Type of Function </strong>: {{ json_decode($booking[0]['details'])->typeoffunction}}</tr>
                <br>
                <tr><strong>Purpose </strong>: {{ json_decode($booking[0]['details'])->purpose}}</tr>
                <br>
                <tr><strong>Event Name </strong>: {{ json_decode($booking[0]['details'])->eventname}}</tr>
                <br>

                </tr>
            </tbody>
        </table>
    </div>
@stop