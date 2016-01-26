`<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Book Room | Please Fill the Form </title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    {{--<link rel="stylesheet" href="../../assets/css/bootstrap-iso.css" />--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- Leave those next 4 lines if you care about users using IE8 -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="../../assets/css/bootstrap-iso.css" />
</head>
@extends('layouts.club')
<body>
    <div class="container" style="margin-top:2%;margin-bottom: 2%;background:#f5f5f5;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        {!! Form::open(array('class' => 'form-horizontal')) !!}

        <div class="row" style="margin:auto;">
            <div class="col-md-10">
                <fieldset>

                    <!-- Form Name -->
                    <div class="bootstrap-iso default-background">
                        <legend align="center"><h3>Please fill in the details for booking the room</h3></legend>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="clubname">Club Name</label>
                        <div class="col-md-4">
                            <input id="clubname" name="clubname" type="text" placeholder="" class="form-control input-md" required="">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="applicantName">Applicant Name </label>
                        <div class="col-md-4">
                            <input id="applicantName" name="applicantName" type="text" placeholder="" class="form-control input-md" required="">
                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="applicantRegistrationNumber">Applicant Registration Number</label>
                        <div class="col-md-4">
                            <input id="applicantRegistrationNumber" name="applicantRegistrationNumber" type="text" placeholder="" class="form-control input-md" required="">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="contact">Contact</label>
                        <div class="col-md-4">
                            <input id="contact" name="contact" type="text" placeholder="" class="form-control input-md">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="typeoffunction">Type of the Function</label>
                        <div class="col-md-4">
                            <input id="typeoffunction" name="typeoffunction" type="text" placeholder="" class="form-control input-md" required="">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="purpose">Purpose</label>
                        <div class="col-md-4">
                            <input id="purpose" name="purpose" type="text" placeholder="" class="form-control input-md" required="">

                        </div>
                    </div>

                    <!-- Multiple Checkboxes -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Equipment Checkbox">Equipments Required</label>
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label for="Equipment Checkbox-0">
                                    <input type="checkbox" name="equipmentcheckbox[]" id="Equipment Checkbox-0" value="LCD">
                                    LCD
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="Equipment Checkbox-1">
                                    <input type="checkbox" name="equipmentcheckbox[]" id="Equipment Checkbox-1" value="OHP">
                                    OHP
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="Equipment Checkbox-2">
                                    <input type="checkbox" name="equipmentcheckbox[]" id="Equipment Checkbox-2" value="Slide Projector">
                                    Slide Projector
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput"></label>
                        <div class="col-md-4">
                            <input id="textinput" name="equipmentcheckbox[]" type="text" placeholder="Other(Components)" class="form-control input-md">
                            <span class="help-block">Fill this if you need any additional components</span>
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="audiovisual">Audio Visual System (Optional)</label>
                        <div class="col-md-4">
                            <textarea class="form-control" id="audiovisual" name="audiovisual"></textarea>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="eventname">Event Name</label>
                        <div class="col-md-4">
                            <input id="eventname" name="eventname" type="text" placeholder="" class="form-control input-md" required="">
                        </div>
                    </div>
                </fieldset>

                <hr>
                
                <fieldset>
                    <!-- Form Name -->
                    <legend align="center">Details Regarding Publicity</legend>
                    <h5 align="center"> * Please Fill in the Venue and the date range in the respective boxes</h5>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="informationdesk">Information Desk Details (Optional)</label>
                        <div class="col-md-4">
                            <textarea class="form-control" id="informationdesk" name="informationdesk"></textarea>
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="banners">Banners (Optional)</label>
                        <div class="col-md-4">
                            <textarea class="form-control" id="banners" name="banners"></textarea>
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="posters">Posters (Optional)</label>
                        <div class="col-md-4">
                            <textarea class="form-control" id="posters" name="posters"></textarea>
                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="displayboard">Display Board (Optional)</label>
                        <div class="col-md-4">
                            <textarea class="form-control" id="displayboard" name="displayboard"></textarea>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group" align="center">
                        <label class="col-md-4 control-label" for="submit"></label>
                        <div class="col-md-4">
                            <button id="submit" name="submit" class="btn btn-primary">Book</button>
                            <a href="/clubbook"><button type="button" class="btn btn-danger">Cancel</button></a>
                        </div>

                    </div>
                </fieldset>
            </div>
        </div>


        {!! Form::close() !!}
    </div>
<!-- Including Bootstrap JS (with its jQuery dependency) so that dynamic components work -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>
