
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
    @if($errors->has('monto'))
        <span class="text-danger"> {{ $errors->first('monto')}}</span>
    @endif
</div>

<div class="form-floating mb-3">
    <input type="number" class="form-control @error('monto') is-invalid @enderror" id="floatingInput" name="monto" value="{{old('monto',$persona->monto ?? '')}}" placeholder="Ingrese un monto">
    <label for="floatingInput">monto</label>
</div>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
    @if($errors->has('descripcion'))
        <span class="text-danger"> {{ $errors->first('descripcion')}}</span>
    @endif
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="floatingInput" name="descripcion" value="{{old('descripcion',$persona->descripcion ?? '')}}" placeholder="Ingrese un descripcion">
    <label for="floatingInput">descripcion</label>
</div>

<div class="form-floating mb-3">
    <select class="form-control @error('tipopago_id') is-invalid @enderror" data-old="{{ old('tipopago_id') }}" name="tipopago_id" id="tipopago_id">
        <option value="" selected> Elija una forma de pago</option>
        @foreach ($tipopagos as $tipopago)
            @isset($pago)     
                <option  value="{{$tipopago->id}}" {{$tipopago->id==$pago->tipopago_id ? 'selected':''}}>{{$tipopago->tipopago}}</option>     
            @else
                <option value="{{ $tipopago->id }}" {{ old('tipopago_id') == $tipopago->id ? 'selected':'' }} >{{ $tipopago->tipopago }}</option>
            @endisset 
        @endforeach
    </select>
    <label for="floatingInput">Tipo pago</label>
</div>

<input hidden class="form-control" type="text" name="reparacion_id" value="{{ $reparacion->id }}">
{{-- {{ $reparacion }} --}}

