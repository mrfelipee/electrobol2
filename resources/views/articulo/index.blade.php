@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@stop

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="">ARTICULOS</h1>
@stop

@section('content')

    <div>
        @php
        //$persona=$cliente->persona;
        @endphp

{{-- {{$cliente }} --}}
    </div>

    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('articulo.create',$cliente->persona->id) }}"><i class="fas fa-plus-circle"></i></a>
                </div>
                <div class="card-body">
                    
                    <table id="articulos" class="table table-light table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>MARCA</th>
                                <th>TIPOARTICULO</th>
                                <th>SERIE</th>
                                <th>FECHAGARANTIA</th>
                                <th>FECHAGARANTIA</th>
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
                
                var tabla=$('#articulos').DataTable(
                    {
                        "serverSide": true,
                        "responsive":true,
                    
                        "ajax":{ 
                                "url":'../articulo/listar',
                                "data":{
                                    cliente_id:"{{$cliente->id}}"
                                },
                                // "success":function(json){
                                //     console.log(json);
                                // },
                            },
                        "columns": [
                            {"data": 'id',name:"id"},
                            {"data": "marca",name:"marca"}, 
                            {"data": "tipoarticulo",name:"tipoarticulo"},
                            {"data": "serie",name:"serie"},
                            {"data": "fecha",name:"fecha"},
                            {"data": "estado",name:"estado"},
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
                $('table').on('click','.eliminar',function (e) {
                    e.preventDefault(); 
                    id=$(this).parent().parent().parent().find('td').first().html();
                    console.log(id);
                    Swal.fire({
                        title: 'Estas seguro(a) de eliminar este registro?',
                        text: "Si eliminas el registro no lo podras recuperar jamás!",
                        type: 'question',
                        showCancelButton: true,
                        showConfirmButton:true,
                        confirmButtonColor: '#25ff80',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Eliminar..!',
                        position:'center',        
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: '../eliminar/articulo/'+id,
                                type: 'DELETE',
                                data:{
                                    id:id,
                                    _token:'{{ csrf_token() }}'
                                },
                                success: function(result) {
                                    console.log(result);
                                    tabla.ajax.reload();
                                    const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 1500,
                                    })
                                    Toast.fire({
                                        type: 'success',
                                        title: 'Se eliminó correctamente el registro'
                                    })   
                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                    switch (xhr.status) {
                                        case 500:
                                            Swal.fire({
                                                title: 'No se completó esta operación por que este registro está relacionado con otros registros',
                                                showClass: {
                                                    popup: 'animate__animated animate__fadeInDown'
                                                },
                                                hideClass: {
                                                    popup: 'animate__animated animate__fadeOutUp'
                                                }
                                            })
                                            break;
                                    
                                        default:
                                            break;
                                    }
                                    
                                }
                            });
                        }else{
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 4000,
                            //type
                                onOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })

                            Toast.fire({
                                type: 'error',
                                title: 'No se eliminó el registro'
                            })
                        }
                    })
                });
            } );
    </script>
@stop
