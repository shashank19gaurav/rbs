@extends('layouts.default')
@section('content')
    <div class="container" style="margin-top: 5%;">
        <h2>Booking Status</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Building</th>
                    <th>Room</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <tr class="success" style="background:#CCFFB2;">
                <td>AB5</td>
                <td>101</td>
                <td>4:00PM</td>
                <td>Confirmed</td>
            </tr>
            <tr class="danger" style="background:#FF3333;">
                <td>AB5</td>
                <td>201</td>
                <td>6:00PM</td>
                <td>Cancelled</td>
            </tr>
            <tr class="info" style="background:#FFFF66;">
                <td>NLH</td>
                <td>201</td>
                <td>4:00PM</td>
                <td>Waiting</td>
            </tr>
            </tbody>
        </table>
    </div>
@stop