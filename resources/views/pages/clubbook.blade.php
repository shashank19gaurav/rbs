<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Room| Room Booking System</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootswatch/3.2.0/sandstone/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap-datepicker.css">

    <style>
        .room{
            margin:2%;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bootstrap-datepicker.js"></script>

    <style>
        body { padding-top:50px; }
    </style>

    <!-- JS -->
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.23/angular.min.js"></script>
    <script src="../../assets/js/app.js"></script>

</head>
<body>
<div class="container" ng-app="sortApp" ng-controller="mainController">

    <h1>Book Room</h1>
    <div class="alert alert-info">
        <div class="container">
            <div class="row" style="color:black;">
                <div class="col-md-3">
                    <label for="building">SELECT BUILDING :</label>

                    <select id="building" ng-model="venueId">
                        <option value="1">NLH</option>
                        <option value="2">AB5</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="date">SELECT DATE :</label>
                    <input id="date" ng-model="date">
                    <span class="add-on"><i class="icon-th"></i></span>

                </div>

                {{--<div class="col-md-3">--}}
                    {{--<label for="time">SELECT TIME :</label>--}}

                    {{--<select id="time">--}}
                        {{--<option value="1">5:30 PM</option>--}}
                        {{--<option value="2">7:30 PM</option>--}}
                    {{--</select>--}}
                {{--</div>--}}

                <div class="col-md-2">
                    <button type="button" ng-click="fetchSlots(date, venueId)" class="btn btn-primary btn-sm">Apply</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Timings :<br/><br/></strong>

            Monday - Saturday : 5.30 PM - 7.30 PM<br/>
            Sunday : 10 AM - 1 PM and 2 PM - 7 PM

        </div>

        <div class="alert alert-danger" ng-if="message!=''">
            <strong>@{{message}}<br/></strong>
        </div>


    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-2" ng-repeat="floor in slotData.data.floor">
                <h4>  Floor : @{{ floor[0].associated_room.room[0] }} </h4>

                <span ng-repeat="slot in floor">
                    <span ng-if="slot.status==='AV'">
                        <a href="/clubbook/book/@{{slot.id}}" class="btn btn-default room" role="button"> @{{  slot.associated_room.room }}</a><br/>
                    </span>
                    <span ng-if="slot.status==='NA'">
                        <a href="/clubbook/book/@{{slot.id}}" class="btn btn-default room disabled" role="button"> @{{  slot.associated_room.room }}</a><br/>
                    </span>
                </span>
            </div>



        </div>
    </div>
</div>

<script>
    $('#date').datepicker({"orientation": "bottom", "autoclose": true});
</script>
</body>
</html>