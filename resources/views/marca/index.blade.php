@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
@stop

@section('title', 'Dashboard')

@section('content_header')
    <h1>MARCAS</h1>
@stop

@section('content')

    <div>
        
    </div>

    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('marca.create')}}" class="btn btn-success"> <i class="fas fa-user-plus"></i> </a>
                </div>
                <div class="card-body">
                    
                    <table id="marcas" class="table table-light table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>MARCA</th>
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
                
                var tabla=$('#marcas').DataTable(
                    {
                        "serverSide": true,
                        "responsive":true,
                    

                        "ajax": "{{ url('api/marcas') }}",
                        "columns": [
                            {"data": 'id',name:"id"},
                            {"data": "marca",name:"marca"}, 
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
                    console.log("id:"+id);
                    Swal.fire({
                        title: 'Estas seguro(a) de eliminar este registro?',
                        text: "Si eliminas el registro no lo podras recuperar jam??s!",
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
                                url: 'eliminar/marca/'+id,
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
                                        title: 'Se elimin?? correctamente el registro'
                                    })   
                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                    switch (xhr.status) {
                                        case 500:
                                            Swal.fire({
                                                title: 'No se complet?? esta operaci??n por que este registro est?? relacionado con otros registros',
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
                                title: 'No se elimin?? el registro'
                            })
                        }
                    })
                });
            } );
    </script>
@stop
