
@extends('layout')

@section('content')

{!! Form::open(['route' => 'register'])!!}

<h1>Registration</h1>

<!-- if there are login errors, show them here -->
<p>
    {!! $errors->first('email')  !!}
    {!! $errors->first('password') !!}
</p>

<p>
    {!! Form::label('username', 'User Name') !!}
    {!!Form::text('username')  !!}
</p>

<p>
<p>
    {!! Form::label('email', 'Email Address') !!}
    {!!Form::text('email', Input::old('email'), array('placeholder' => 'email@email.com'))  !!}
</p>

</p>

<p>
    {!!  Form::label('password', 'Password')  !!}
    {!! Form::password('password') !!}
</p>
<p>
    {!!  Form::label('password_confirmation', 'Confirm Password')  !!}
    {!! Form::password('password_confirmation') !!}
</p>

<p>{!! Form::submit('Register') !!} {!! Form::reset('Clear') !!} </p>


{!!  Form::close()  !!}


@stop

