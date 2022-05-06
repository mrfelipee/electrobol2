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
                PAGO CREATE
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <form method="post" action="{{ route('pago.guardar') }}">
                            @csrf
                                @include('pago.form')
                                @if ($reparacion->costo-$acuenta>0)
                                    @include('include.boton')
                                @else 
                                    <a class="btn btn-success" href="{{ route('articulo.entregar',$reparacion->id) }}">Entregar <i class="fas fa-clipboard-check text-success"></i></a>
                                @endif
                        </form>
                    </div>
                    <div class="col-6">
                        <table class="table table-hover table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td>Costo Total</td>
                                    <td>{{$reparacion->costo}}</td>
                                </tr>
                                <tr>
                                    <td>Acuenta</td>
                                    <td>{{ $acuenta }}</td>
                                </tr>
                                <tr>
                                    <td>Saldo</td>
                                    <td> {{ $reparacion->costo-$acuenta }} </td>
                                </tr>
                            </tbody>
                        </table>

                       
                    </div>
                </div>
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
