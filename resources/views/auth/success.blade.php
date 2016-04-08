@extends('layout')

@section('content')

<div>
    You Were Successfully Registered</br>


@foreach($results as $result)


        <table >


            <tr>
                <td>
                      {!! $result->username !!}
                </td>

                <td>

                      {!! $result->email !!}
                </td>

            </tr>
        </table>

    @endforeach




</div>

@stop