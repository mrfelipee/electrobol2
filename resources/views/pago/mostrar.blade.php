@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Dashboard')

@section('content_header')
    <h1>PERSONA editar</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                DATOS
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Atributo</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{ $persona->id }}</td>
                        </tr>
                        <tr>
                            <td>NOMBRE</td>
                            <td>{{ $persona->nombre }}</td>
                        </tr>
                        <tr>
                            <td>APELLIDOS</td>
                            <td>{{ $persona->apellidos }}</td>
                        </tr>
                        <tr>
                            <td>DIRECCION</td>
                            <td>{{ $persona->direccion }}</td>
                        </tr>
                        <tr>
                            <td>CARNET IDENTIDAD</td>
                            <td>{{ $persona->carnet }}</td>
                        </tr>
                        <tr>
                            <td>CREADO</td>
                            <td>{{ $persona->created_at }}</td>
                        </tr>

                        <tr>
                            <td>UPDATED</td>
                            <td>{{ $persona->updated_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop


@section('js')

@stop
