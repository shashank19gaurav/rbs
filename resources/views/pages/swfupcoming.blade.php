@extends('layouts.swf')
@section('content')

    <div class="container" style="margin-top: 5%;">
        <h4 style="float: right;color:black;">* Please add any remark before approving or disapproving.</h4>
        @if (isset($message))
            {{-- Message to be dispalyed incase redirected from approval or disapproval --}}
            {{ $message  }}
        @endif
        <h2>Booking Status</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Building</th>
                    <th>Room</th>
                    <th>Date</th>
                    <th>Faculty Advisor</th>
                    <th> Your Remark</th>
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
                        @if ($booking['approved_by_fa'] === 1)
                            <td> {{'Approved'}}
                        @else
                            <td> {{'In Progress'}}
                        @endif
                        @if ($booking['fa_remarks'] != null)
                            <strong><br/> Remarks : {{$booking['fa_remarks']}}</strong>
                        @endif
                        </td>
                        @if ($booking['swf_remarks'] !=null)
                            <td>  <strong> {{ $booking['swf_remarks'] }} </strong> </td>
                        @else
                            <td> {{  '-'   }}</td>
                        @endif
                        <td><a href="/swfhistory/{{$booking['id']}}">Details</a></td>
                        <td><a href="/swfapprove/{{$booking['id']}}" onclick="javascript:return confirm('Are you sure to approve this booking ?')">Approve</a></td>
                        <td><a href="/swfdisapprove/{{$booking['id']}}" onclick="javascript:return confirm('Are you sure to disapprove this booking ?')">Disapprove</a></td>
                        <td><a href="/swfremark/{{$booking['id']}}">Add/Change Remark</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop