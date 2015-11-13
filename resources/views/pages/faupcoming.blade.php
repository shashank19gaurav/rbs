@extends('layouts.fa')
@section('content')
    {{--{{$bookingsData}}--}}
    <div class="container" style="margin-top: 5%;">
        <h2>Booking Status</h2>
        <h4 style="float: right;color:black;">* Please add any remark before approving or disapproving.</h4>
        @if (isset($message))
            {{-- Message to be dispalyed incase redirected from approval or disapproval --}}
            {{ $message  }}
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Building</th>
                    <th>Room</th>
                    <th>Date</th>
                    <th>Remark</th>
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
                        @if ($booking['fa_remarks'] !=null)
                            <td> <strong>{{ $booking['fa_remarks'] }}</strong></td>
                        @else
                            <td> {{  '-'   }}</td>
                        @endif
                        <td><a href="/fahistory/{{$booking['id']}}">Details</a></td>
                        <td><a href="/faapprove/{{$booking['id']}}" onclick="javascript:return confirm('Are you sure to confirm this booking?')">Approve</a></td>
                        <td><a href="/fadisapprove/{{$booking['id']}}" onclick="javascript:return confirm('Are you sure to cancel this booking ?')">Disapprove</a></td>
                        <td><a href="/faremark/{{$booking['id']}}">Add/Change Remark</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop