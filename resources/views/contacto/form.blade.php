
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
    @if($errors->has('id'))
        <span class="text-danger"> {{ $errors->first('id')}}</span>
    @endif
</div>

<div class="form-floating mb-3">
    <select class="form-control @error('tipocontacto_id') is-invalid @enderror" data-old="{{ old('tipocontacto_id') }}" name="tipocontacto_id" id="country">
        <option value="" > seleccione Tipocontacto</option>
        @foreach ($tipocontactos as $tipocontacto)
            @isset($contacto)     
                <option  value="{{$tipocontacto->id}}" {{$contacto->id==$contacto->tipocontacto_id ? 'selected':''}}>{{$tipocontacto->tipo}}</option>     
            @else
                <option value="{{ $tipocontacto->id }}" {{ old('tipocontacto_id') == $tipocontacto->id ? 'selected':'' }} >{{ $tipocontacto->tipo }}</option>
            @endisset 
        @endforeach
    </select>
    <label for="floatingInput">ID</label>
</div>

<input hidden  type="text" name="persona_id" id="" value="{{ $persona->id }}">

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
    @if($errors->has('contacto'))
        <span class="text-danger"> {{ $errors->first('contacto')}}</span>
    @endif
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control @error('contacto') is-invalid @enderror" id="floatingInput" name="contacto" value="{{old('contacto',$contacto->contacto ?? '')}}" placeholder="CONTACTO">
    <label for="floatingInput">CONTACTO</label>
    
</div>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
    @if($errors->has('detalle'))
        <span class="text-danger"> {{ $errors->first('detalle')}}</span>
    @endif
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control @error('detalle') is-invalid @enderror" id="floatingInput" name="detalle" value="{{old('detalle',$contacto->detalle ?? '')}}" placeholder="DETSLLE">
    <label for="floatingInput">detalle</label>
</div>



