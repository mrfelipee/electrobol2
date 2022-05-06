@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div class="container">
        
         <div class="card">
            <div class="card-header bg-black">
                REAPARACION CREAR
            </div>
            <div class="card-body">
                 <form method="post" action="{{ route('reparacion.guardar') }}">
                    @csrf
                    @include('reparacion.form')
                    @include('include.boton')
                </form>
            </div>
        </div>    
        
            
    </div>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
    CKEDITOR.replace( 'problema' );
    </script>
@stop