<a href="{{ route('articulo.edit',$id) }}" class="btn-accion-tabla tooltipsC mr-2 editar" title="Editar este motivo">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>
<a href="{{ route('reparacion.create',['cliente_id'=>$cliente_id,'articulo_id'=>$id]) }}" class="btn-accion-tabla tooltipsC mr-2 editar" title="Editar este motivo">
    <i class="fas fa-tools"></i>
</a>

<form action=""  class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar este motivo">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form>
