@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@stop

@section('title', 'Dashboard')

@section('content_header')
    <h1>Contactos</h1>
@stop

@section('content')

    <div>
        {{-- {{ $miscontactos }} --}}
    </div>

    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    {{-- <a href="{{route('persona.create')}}" class="btn btn-success"> <i class="fas fa-user-plus"></i> </a> --}}
                </div>
                <div class="card-body">
                    <table id="contactos" class="table table-light table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>APELLIDO</th>
                                <th>DIRECCION</th>
                                <th>OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($miscontactos as $contacto)
                                <tr>
                                    <td>{{ $contacto->id }}</td>
                                    <td>{{ $contacto->contacto }}</td>
                                    <td>{{ $contacto->detalle }}</td>
                                    <td>{{ $contacto->tipocontacto_id}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop



@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            
        });
    </script>
@stop
