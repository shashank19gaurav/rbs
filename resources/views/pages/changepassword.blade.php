@extends('layouts.default')
@section('content')
    <section id="main" class="container 75%">
        <header>
            <h2>Login</h2>
        </header>
        <div class="box">
            {!! Form::open(array('url' => 'changepasswordrequest')) !!}
                <p>
                    {!! $errors->first('email') !!}
                    {!! $errors->first('password') !!}
                </p>
                <div class="row uniform 50%" style="font-size: 25px;">
                    <div class="6u 12u(mobilep)">
                        <p style="padding: 4%;">
                            {!!  Form::label('oldPassword', 'Old Password :') !!}
                        </p>
                    </div><div class="6u 12u(mobilep)">
                        <p style="padding: 4%;">
                            {!!  Form::password('oldPassword', Input::old('email'), array('placeholder' => 'Please enter your old password', 'style' => 'display:inline'))  !!}
                        </p>
                    </div>
                    <div class="6u 12u(mobilep)">
                        <p style="padding: 4%;">
                            {!!  Form::label('newPassword', 'New Password :') !!}
                        </p>
                    </div>
                    <div class="6u 12u(mobilep)">
                        <p style="padding: 4%;">
                            {!!  Form::password('newPassword', Input::old('newPassword'), array('placeholder' => 'Please enter your new password', 'style' => 'display:inline'))  !!}
                        </p>
                    </div>
                    <div class="6u 12u(mobilep)">
                        <p style="padding: 4%;">
                            {!!  Form::label('confirmPassword', 'Confirm Password :') !!}
                        </p>
                    </div><div class="6u 12u(mobilep)">
                        <p style="padding: 4%;">
                            {!!  Form::password('confirmPassword', Input::old('confirmPassword'), array('placeholder' => 'Please confirm your new password', 'style' => 'display:inline'))  !!}
                        </p>
                    </div>
                </div>

                <div class="row uniform">
                    <div class="12u">
                        <ul class="actions align-center">
                            <li>
                                {!! Form::submit('Submit!') !!}
                            </li>
                        </ul>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </section>
@stop