<a href="{{ route('evaluacion.create',$id) }}" class="btn-accion-tabla tooltipsC mr-2 editar" title="Agregar Evaluación">
    <i class="fas fa-comment-medical text-secodary"></i>
</a>

<a href="{{ route('articulo.alta',$id) }}" class="btn-accion-tabla tooltipsC mr-2" title="Dar de alta para reparación">
    <i class="fas fa-clipboard-check text-success"></i>
</a>

<a href="{{ route('pago.create',$id) }}" class="btn-accion-tabla tooltipsC mr-2 mostrar" title="Entregar articulo">
    <i class="fas fa-money-bill-alt text-warning"></i>
</a>

<a href="{{ route('articulo.baja',$id) }}" class="btn-accion-tabla tooltipsC mr-2 mostrar" title="No quiere el trabajo">
    <i class="fas fa-times-circle text-danger"></i>
</a>
{{ $estado }}


