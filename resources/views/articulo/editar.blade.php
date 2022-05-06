@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Dashboard')

@section('content_header')
    <h1>ARTICULO EDITAR</h1>
@stop

@section('content')
    <div class="container">
       
        <div class="card">
            <div class="card-header bg-black">
                ARTICULO CREATE
            </div>
            <div class="card-body">
                 <form method="post" action="{{ route('articulo.update',$articulo) }}">
                    {{ method_field('PATCH') }}
                    @csrf
                    @include('articulo.form')
                    @include('include.boton')
                </form>
            </div>
        </div>    
    </div>
@stop


@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

   
    <script>
        $(document).ready(function() {
                
        });
    </script>
@stop
