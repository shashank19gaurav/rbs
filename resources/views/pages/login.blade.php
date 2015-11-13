@extends('layouts.default')
@section('content')
    <section id="main" class="container 75%">
        <header>
            <h2>Login</h2>
        </header>
        <div class="box">
            {!! Form::open(array('url' => 'login')) !!}
                <p>
                    {!! $errors->first('email') !!}
                    {!! $errors->first('password') !!}
                </p>
                <div class="row uniform 50%">
                    <div class="6u 12u(mobilep)">
                        <p>
                            {{--{{ Form::label('email', 'Email Address') }}--}}
                            {!!  Form::text('email', Input::old('email'), array('placeholder' => 'Please enter Email Address'))  !!}
                        </p>
                    </div>
                    <div class="6u 12u(mobilep)">
                            {!! Form::password('password',  array('placeholder' => 'Please enter Password'))  !!}
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