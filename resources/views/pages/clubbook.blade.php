//TODO:: Fix this page

@extends('layouts.default')
@section('content')

    <style>
        /* checkbox - each time slot */
        .time-slot               {  }

        /* hide the checkbox itself - the label will be styled */
        .time-slot input     {
            display:none;
        }

        /* default styling for our labels */
        .time-slot label     {
            padding:10px 20px;
            color:#FFF;
            cursor:pointer;
            background:#EEE;
            border-radius:5px;
            transition:0.3s ease all;
        }

        /* if the label is checked */
        .time-slot input:checked ~ label {
            background:#f2dede;
            cursor:not-allowed;
            animation:flashBooked 0.5s ease;
        }

        /* if the label is not checked */
        .time-slot input:not(:checked) ~ label {
            background:#6AB074;
            animation:flashAvailable 0.5s ease;
        }

        /* animation for the time slot to flash red */
        @keyframes flashBooked {
            0%, 100%  { background:#f2dede; transform:scale(1); }
            50%       { background:#F99090; transform:scale(1.5); }
        }

        /* animation for the time slot to flash green */
        @keyframes flashAvailable {
            0%, 100%  { background:#6AB074; transform:scale(1); }
            50%       { background:rgb(119, 218, 78); transform:scale(1.5); }
        }
    </style>

    <section style="height: 100%;">
        <br><br><br>

        <ul class="actions" name="name" align="center">
            <label for="name">Select Date</label>
            <input type="date" data-date-inline-picker="true" />
        </ul>

        <ul align="center" class="actions" name="time" align="center" style="width:30%;margin:auto;">
            <label for="time">Select time</label>
            <select name="carlist" form="carform">
                <option value="volvo">4:00 PM</option>
                <option value="saab">6:00 PM</option>
            </select>
        </ul>



    </section>


    <div class="container" ng-app="scheduleApp" ng-controller="mainController">
        <div class="row times">

            <div class="col-md-4 text-center">

                <h2>1st Floor</h2>

                <div class="time-slot">
                    <input type="checkbox" id="monday-time">
                    <label for="monday-time">101</label>
                </div>

                <div class="time-slot">
                    <input type="checkbox" id="monday-time">
                    <label for="monday-time">101</label>
                </div>

                <div class="time-slot">
                    <input type="checkbox" id="monday-time">
                    <label for="monday-time">101</label>
                </div>

                <div class="time-slot">
                    <input type="checkbox" id="monday-time">
                    <label for="monday-time">101</label>
                </div>

                <div class="time-slot">
                    <input type="checkbox" id="monday-time">
                    <label for="monday-time">101</label>
                </div>

                <div class="time-slot">
                    <input type="checkbox" id="monday-time">
                    <label for="monday-time">101</label>
                </div> </div>


            <div class="col-md-4 text-center">

                <h2>2nd Floor</h2>

                <div class="time-slot">
                    <input type="checkbox" id="monday-time">
                    <label for="monday-time">101</label>
                </div>

                <div class="time-slot">
                    <input type="checkbox" id="monday-time">
                    <label for="monday-time">101</label>
                </div>

                <div class="time-slot">
                    <input type="checkbox" id="monday-time">
                    <label for="monday-time">101</label>
                </div>

                <div class="time-slot">
                    <input type="checkbox" id="monday-time">
                    <label for="monday-time">101</label>
                </div>

                <div class="time-slot">
                    <input type="checkbox" id="monday-time">
                    <label for="monday-time">101</label>
                </div>

                <div class="time-slot">
                    <input type="checkbox" id="monday-time">
                    <label for="monday-time">101</label>
                </div>  </div>

            <div class="col-md-4 text-center">

                <h2>2nd Floor</h2>

                <div class="time-slot">
                    <input type="checkbox" id="monday-time">
                    <label for="monday-time">101</label>
                </div>

                <div class="time-slot">
                    <input type="checkbox" id="monday-time">
                    <label for="monday-time">101</label>
                </div>

                <div class="time-slot">
                    <input type="checkbox" id="monday-time">
                    <label for="monday-time">101</label>
                </div>

                <div class="time-slot">
                    <input type="checkbox" id="monday-time">
                    <label for="monday-time">101</label>
                </div>

                <div class="time-slot">
                    <input type="checkbox" id="monday-time">
                    <label for="monday-time">101</label>
                </div>

                <div class="time-slot">
                    <input type="checkbox" id="monday-time">
                    <label for="monday-time">101</label>
                </div>    </div>
        </div>

        <script type="text/javascript">
            $('#timepicker1').timepicker();
        </script>
@stop