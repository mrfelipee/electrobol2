<a href="{{ route('marca.edit',$id) }}" class="btn-accion-tabla tooltipsC mr-2 editar" title="Editar este motivo">
    <i class="fa fa-fw fa-edit text-primary"></i>
</a>
<form class="d-inline formulario">
    @csrf
    @method("delete")
    <button name="btn-eliminar" id="{{$id}}" type="submit" class="btn eliminar" title="Eliminar este motivo">
        <i class="fa fa-fw fa-trash text-danger"></i>   
    </button>
</form>
