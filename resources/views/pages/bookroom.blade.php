@extends('layouts.default')
@section('content')
    <div class="container" style="margin-top:2%;margin-bottom: 2%;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        {!! Form::open(array('class' => 'form')) !!}

        <div class="form-group">
            {!! Form::label('Registration Number') !!}
            {!! Form::text('regno', null,
                array('required',
                      'class'=>'form-control',
                      'placeholder'=>'Please enter your Registration Number')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Event Name') !!}
            {!! Form::text('event', null,
                array('required',
                      'class'=>'form-control',
                      'placeholder'=>'Your enter Event Name')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Event Details') !!}
            {!! Form::textarea('description', null,
                array('required',
                      'class'=>'form-control',
                      'placeholder'=>'Please provide some details about your event')) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Book Room',
              array('class'=>'btn btn-primary')) !!}
        </div>
        {!! Form::close() !!}
    </div>

@stop