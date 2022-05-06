<a href="{{ route('persona.edit',$id) }}" class="btn-accion-tabla tooltipsC mr-2 editar" title="Editar este motivo">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>

<a href="{{ route('persona.show',$id) }}" class="btn-accion-tabla tooltipsC mr-2 mostrar" title="Ver este tipomotivo">
    <i class="fa fa-fw fa-eye text-primary"></i>
</a>

<form action=""  class="d-inline formulario eliminar">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar este motivo">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form>

<a href="{{ route('contacto.index',$id) }}" class="btn-accion-tabla tooltipsC mr-2 mostrar" title="Ver este tipomotivo">
    <i class="fa fa-fw fa-phone text-primary"></i>
</a>

<a href="{{ route('reparacion.index',$id) }}" class="btn-accion-tabla tooltipsC mr-2" title="Listar reparaciones de este tecnico">
    Reparaciones
</a>