@extends('layouts.security')
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
                    <th>Student Welfare</th>
                    <th>Security Section</th>
                    <th>Faculty Advisor</th>
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
                        @if ($booking['approved_by_swf'] === 1)
                            <td> {{'Approved'}}</td>
                        @else
                            <td> {{'In Progress'}}</td>
                        @endif

                        @if ($booking['approved_by_security'] === 1)
                            <td> {{'Approved'}}</td>
                        @else
                            <td> {{'In Progress'}}</td>
                        @endif

                        @if ($booking['approved_by_fa'] === 1)
                            <td> {{'Approved'}}</td>
                        @else
                            <td> {{'In Progress'}}</td>
                        @endif
                            <td><a href="/securityhistory/{{$booking['id']}}">Details</a></td>
                    </tr>
                @endforeach
            {{--<tr class="success" style="background:#CCFFB2;">--}}
                {{--<td>AB5</td>--}}
                {{--<td>101</td>--}}
                {{--<td>4:00PM</td>--}}
                {{--<td>Confirmed</td>--}}
            {{--</tr>--}}
            {{--<tr class="danger" style="background:#FF3333;">--}}
                {{--<td>AB5</td>--}}
                {{--<td>201</td>--}}
                {{--<td>6:00PM</td>--}}
                {{--<td>Cancelled</td>--}}
            {{--</tr>--}}
            {{--<tr class="info" style="background:#FFFF66;">--}}
                {{--<td>NLH</td>--}}
                {{--<td>201</td>--}}
                {{--<td>4:00PM</td>--}}
                {{--<td>Waiting</td>--}}
            {{--</tr>--}}
            </tbody>
        </table>
    </div>
@stop