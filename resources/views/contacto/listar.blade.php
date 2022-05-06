@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@stop

@section('title', 'Dashboard')

@section('content_header')
    <h1>Contactos de: {{ $persona->nombre.' '.$persona->apellidos }} </h1> 
@stop

@section('content')

    <div>
        {{-- {{ $miscontactos }} --}}
    </div>

    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('contacto.create',$persona_id)}}" class="btn btn-success"> <i class="fas fa-user-plus"></i> </a>
                </div>
                <div class="card-body">
                    <table id="contactos" class="table table-light table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>CONTACTO</th>
                                <th>DETALLE</th>
                                <th>TIPOCONTACTO</th>
                                <th>OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($miscontactos as $contacto)
                                <tr>
                                    <td>{{ $contacto->id }}</td>
                                    <td>{{ $contacto->contacto }}</td>
                                    <td>{{ $contacto->detalle }}</td>
                                    <td>{{ $contacto->tipo}}</td>
                                    <td>
                                        <a href="{{ route('contacto.edit',$contacto->id) }}" class="btn-accion-tabla tooltipsC mr-2 editar" title="Editar este motivo">
                                            <i class="fa fa-fw fa-edit text-primary"></i>
                                        </a>
                                        {{-- <form action="{{ route('contacto.destroy',$contacto->id)}}" method="GET"  class="d-inline formulario eliminar"> --}}
                                        <form action="" class="d-inline formulario eliminar">
                                            @csrf
                                            {{-- @method("delete") --}}
                                            <button name="btn-eliminar" id="{{$contacto->id}}" type="submit" class="btn eliminar" title="Eliminar este motivo">
                                                <i class="fa fa-fw fa-trash text-danger"></i>   
                                            </button>
                                        </form>
                                    </td>
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
                            console.log("actual"+id);
                            $.ajax({
                                url: '../eliminar/contacto/'+id,
                                type: 'DELETE',
                                data:{
                                    id:id,
                                    _token:'{{ csrf_token() }}'
                                },
                                success: function(result) {
                                    console.log(result);
                                    // $('contactos').ajax.reload();
                                    location.reload();
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