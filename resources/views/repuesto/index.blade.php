@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@stop

@section('title', 'Dashboard')

@section('content_header')
    <h1>REPUESTOS</h1>
@stop

@section('content')

    <div>
        
    </div>

    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('repuesto.create')}}" class="btn btn-success"> <i class="fas fa-user-plus"></i> </a>
                </div>
                <div class="card-body">
                    
                    <table id="repuestos" class="table table-light table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>MARCA</th>
                                <th>SERIE</th>
                                <th>STOCK</th>
                                <th>DESCRIPCION</th>
                                <th>OPCIONES</th>
                            </tr>
                        </thead>
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
                
                var tabla=$('#repuestos').DataTable(
                    {
                        "serverSide": true,
                        "responsive":true,
                        "ajax": "{{ url('api/repuestos') }}",
                        "columns": [
                            {"data": 'id',name:"id"},
                            {"data": "nombre",name:"nombre"}, 
                            {"data": "marca",name:"marca"},
                            {"data": "serie",name:"serie"},
                            {"data": "stock",name:"stock"},
                            {"data": "descripcion",name:"descripcion"},
                            {
                                "name":"btn",
                                "data": 'btn',
                                "orderable": false,
                            },
                        ],
                        "language":{
                            "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                        },  
                    }
                );
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% E L I M I N A R  P E R S O N A %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
              
            } );
    </script>
@stop
