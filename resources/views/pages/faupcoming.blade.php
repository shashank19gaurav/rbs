@extends('layouts.fa')
@section('content')
    {{--{{$bookingsData}}--}}
    <div class="container" style="margin-top: 5%;">
        <h2>Booking Status</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Building</th>
                    <th>Room</th>
                    <th>Date</th>
                    <th></th>
                </tr>



            </thead>
            <tbody>

                @foreach ($bookingsData as $booking)
                    <tr class="success" style="background:#CCFFB2;">
                        @if ($booking['associated_venue_room']['venue_id'] === 1)
                            <td> {{'NLH'}}</td>
                        @else
                            <td> {{'AB5'}}</td>
                        @endif
                        <td>{{$booking['associated_venue_room']['room']}}</td>
                        <td>{{$booking['associated_venue_room_slot']['date']}}</td>

                        <td><a href="/fahistory/{{$booking['id']}}">Details</a></td>
                        <td><a href="/faapprove/{{$booking['id']}}" onclick="confirm('Are you sure to confirm this booking from your side ?')">Approve</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop