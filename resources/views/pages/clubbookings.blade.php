@extends('layouts.club')
@section('content')
    {{--{{$bookingsData}}--}}
    <div class="container" style="margin-top: 5%;">
        <h2>Booking Status</h2>

        <h4 style="color:black;float:right;">*Bookings highlighted in red are either cancelled/disapproved</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Building</th>
                    <th>Room</th>
                    <th>Date</th>
                    <th>Faculty Advisor</th>
                    <th>Student Welfare</th>
                    <th>Security Section</th>
                    <th></th>
                    <th></th>
                </tr>



            </thead>
            <tbody>

                @foreach ($bookingsData as $booking)
                    @if ($booking['disapproved_by']!=null)
                        <tr class="danger" style="background:rgba(255, 37, 7, 0.53);">
                    @else
                        <tr class="success" style="background:#CCFFB2;">
                    @endif
                        @if ($booking['associated_venue_room']['venue_id'] === 1)
                            <td> {{'NLH'}}</td>
                        @else
                            <td> {{'AB5'}}</td>
                        @endif
                        <td>{{$booking['associated_venue_room']['room']}}</td>
                        <td>{{$booking['associated_venue_room_slot']['date']}}</td>
                        @if ($booking['approved_by_fa'] === 1)
                            <td> {{'Approved'}}
                        @else
                            <td> {{'In Progress'}}
                        @endif
                        @if ($booking['fa_remarks'] != null)
                            <strong><br/> Remarks : {{$booking['fa_remarks']}}</strong>
                        @endif
                            </td>
                        @if ($booking['approved_by_swf'] === 1)
                            <td> {{'Approved'}}
                        @else
                            <td> {{'In Progress'}}
                        @endif
                        @if ($booking['swf_remarks'] != null)
                            <strong><br/> Remarks : {{$booking['swf_remarks']}}</strong>
                        @endif
                       </td>

                        @if ($booking['approved_by_security'] === 1)
                            <td> {{'Approved'}}
                        @else
                            <td> {{'In Progress'}}
                        @endif

                        @if ($booking['security_remarks'] != null)
                            <strong><br/> Remarks : {{$booking['security_remarks']}}</strong>
                        @endif
                        </td>

                        <td><a style="color: rgba(0, 0, 0, 0.71);" href="/clubbookings/{{$booking['id']}}">Details</a></td>
                        <td><a style="color: rgba(0, 0, 0, 0.71);" href="/clubcancel/{{$booking['venue_room_slot_id']}} " onclick="javascript:return confirm('Are you sure you want to cancel this booking?')">Cancel</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        function confirm_delete() {
            return confirm('Are you sure want to cancel this booking?');
        }
    </script>
@stop