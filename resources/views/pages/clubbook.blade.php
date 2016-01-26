
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Room| Room Booking System</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap-iso.css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootswatch/3.2.0/sandstone/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://raw.githubusercontent.com/shashank19gaurav/rbs/master/resources/assets/css/bootstrap-iso.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap-datepicker.css">
    {{--<link rel="stylesheet" type="text/css" href="http://iainheng.com/assets/fo/scripts/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css">--}}

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
@extends('layouts.club')
<body>
    <div>
        <div class="container" ng-app="sortApp" ng-controller="mainController" style="margin-top:10%">
            <div class="bootstrap-iso center-block default-background" align="center" style="margin-bottom: auto;">
                <h1>Book Room</h1>
            </div>

            <div class="alert alert-info">
                    <div class="row" style="color:black;">
                        <div class="col-md-2">
                            <label for="building" >SELECT BUILDING :</label>
                        </div>
                        <div class="col-md-4" >
                            <select id="building" ng-model="venueId" style="height:initial!important;width: 100%;">
                                <option value="1">NLH</option>
                                <option value="2">AB5</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label for="date">SELECT DATE :</label>
                        </div>
                        <div class="col-md-4" >
                            <input id="date" ng-model="date" style="text-align:center;border-radius: 5px!important; ">
                            <span class="add-on"><i class="icon-th"></i></span>

                        </div>
        <br>
        </div>
            <div class="row" style="color:black;">
                        <div class="col-md-7 col-md-offset-5">
                            <span class="center-block">
                                <button type="button" ng-click="fetchSlots(date, venueId)" class="btn btn-primary btn-sm" style="width: 20%;font-size:14pt;  margin: auto!important;">
                                    Apply
                                </button>
                            </span>
                        </div>
                    </div>

            </div>
            <div class="alert alert-info" style="background-color: #DDE029;">
                <div class="container">
                    <div class="" style="color:black;">
                        <div class="col-md-11">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" style="  color: #000000;">&times;</a>
                            <strong><b>Timings :</b><br/></strong>

                            Monday - Saturday : 5.30 PM - 7.30 PM<br/>
                            Sunday : 10 AM - 1 PM and 2 PM - 7 PM
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert alert-danger" ng-if="message!=''">
                <div class="container">
                    <div class="" style="color:black;">
                        <div class="col-md-11">
                            {{--<a href="#" class="close" data-dismiss="alert" aria-label="close" style="  color: #000000;">&times;</a>--}}
                            <strong>@{{message}}<br/></strong>
                        </div>
                    </div>
                </div>

            </div>

            <div class="container">
                <div class="row">
                    <div ng-class="{3:'col-md-4',4:'col-md-3'}[slotData.data.floor.length]" ng-repeat="floor in slotData.data.floor">

                        <h4>  Floor : @{{ floor[0].associated_room.room[0] }} </h4>

                    <span ng-repeat="slot in floor">
                        <span ng-if="slot.status==='AV'">
                            <a href="/clubbook/book/@{{slot.id}}" class="btn btn-default room" role="button" style="font-size: 20px;"> @{{  slot.associated_room.room }}</a><br/>
                        </span>
                        <span ng-if="slot.status==='NA'">
                            <a href="/clubbook/book/@{{slot.id}}" class="btn btn-default room disabled" role="button" style="font-size: 20px;"> @{{  slot.associated_room.room }}</a><br/>
                        </span>
                    </span>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script>
        var nowDate = new Date();
        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

        $('#date').datepicker({
            "orientation": "bottom",
            "autoclose": true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            startDate: today
        });
    </script>
</body>
</html>