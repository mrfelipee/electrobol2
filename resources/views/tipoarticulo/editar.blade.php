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
            <div class="card-header bg-dark">
                TIPOARTICULO CREATE
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('tipoarticulo.update',$tipoarticulo) }}">
                    {{ method_field('PATCH') }}
                    @csrf
                    @include('tipoarticulo.form')
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
