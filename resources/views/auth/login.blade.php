

@extends('layout')

@section('content')
{!! Form::open(['url' => 'auth/login'])!!}

        <h1>Login</h1>

        <!-- if there are login errors, show them here -->


        <p>
            {!! Form::label('email', 'Email Address') !!}
            {!!Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com'))  !!}
        </p>

        <p>
            {!!  Form::label('password', 'Password')  !!}
            {!! Form::password('password') !!}
        </p>

        <p>{!! Form::submit('Login') !!} {!! Form::reset('Clear') !!}</p>


{!!  Form::close()  !!}
@stop


