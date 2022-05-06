
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
    @if($errors->has('costo'))
        <span class="text-danger"> {{ $errors->first('costo')}}</span>
    @endif
</div>

<div class="form-floating mb-3">
    <input type="number" class="form-control @error('costo') is-invalid @enderror" id="floatingInput" name="costo" value="{{old('costo',$reparacion->costo ?? '')}}" placeholder="ingrese costo(Opcional)">
    <label for="floatingInput">costo</label>
</div>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
    @if($errors->has('costo'))
        <span class="text-danger"> {{ $errors->first('costo')}}</span>
    @endif
</div>
<div class="form-floating mb-3">
    <select class="form-control @error('tecnico_id') is-invalid @enderror" data-old="{{ old('tecnico_id') }}" name="tecnico_id" id="tecnico_id">
        <option value="" selected> Elija un Tecnico</option>
        @foreach ($tecnicos as $tecnico)
            @isset($reparacion)     
                <option  value="{{$tecnico->id}}" {{$tecnico->id==$reparacion->tecnico_id ? 'selected':''}}>{{$tecnico->nombre.' '.$tecnico->apellidos}}</option>     
            @else
                <option value="{{ $tecnico->id }}" {{ old('tecnico_id') == $tecnico->id ? 'selected':'' }} >{{ $tecnico->nombre.' '.$tecnico->apellidos }}</option>
            @endisset 
        @endforeach
    </select>
    <label for="floatingInput">Tecnicos</label>
</div>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
    @if($errors->has('problema'))
        <span class="text-danger"> {{ $errors->first('problema')}}</span>
    @endif
</div>
<textarea class="form-control  @error('problema') is-invalid @enderror" id="problema" name="problema"> {{ old('problema',$reparacion->problema ?? '') }} </textarea>
@isset($cliente)
<input hidden class="form-control" type="text" name="cliente_id" value="{{ $cliente->id }}">
@endisset

@isset($articulo)
<input hidden class="form-control" type="text" name="articulo_id" value="{{ $articulo->id }}">
@endisset