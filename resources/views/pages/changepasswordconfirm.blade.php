@extends('layouts.default')
@section('content')
    <section id="main" class="container 75%">
        <header>
            @if ($passwordChanged === 1)
                <h2>Password Changed!</h2><br/>
                <p>Please login again <a href="/">here</a></p>
            @elseif ($passwordChanged == 0)
                <h2>Error Changing the password</h2><br/>
                <p>Please try again here <a href="/changepassword">here</a></p>
            @endif
        </header>
    </section>
@stop