@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Dashboard')

@section('content_header')
    <h1>PERSONA CREAR</h1>
@stop

@section('content')
    <div class="container">
        <form method="post" action="{{ route('persona.guardar') }}">
            @csrf
            @include('persona.form')
            @include('include.boton')
        </form>
            
    </div>
@stop



@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

   
    <script>
        $(document).ready(function() {
                
        });
    </script>
@stop
