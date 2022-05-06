
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
    @if($errors->has('serie'))
        <span class="text-danger"> {{ $errors->first('serie')}}</span>
    @endif
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control" id="floatingInput" name="serie" value="{{old('serie',$articulo->serie ?? '')}}" placeholder="serieS">
    <label for="floatingInput">serie</label>
</div>


<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
    @if($errors->has('fecha'))
        <span class="text-danger"> {{ $errors->first('fecha')}}</span>
    @endif
</div>
<div class="form-floating mb-3">
    <input type="date" class="form-control" id="floatingInput" name="fecha" value="{{old('fecha',$articulo->fecha ?? '')}}" placeholder="fecha">
    <label for="floatingInput">fecha fin garantia</label>
</div>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
    @if($errors->has('marca_id'))
        <span class="text-danger"> {{ $errors->first('marca_id')}}</span>
    @endif
</div>
<div class="form-floating mb-3">
    <select class="form-control @error('marca_id') is-invalid @enderror" data-old="{{ old('marca_id') }}" name="marca_id" id="country">
        <option value="" selected> Elija una Marca</option>
        @foreach ($marcas as $marca)
            @isset($articulo)     
                <option  value="{{$marca->id}}" {{$marca->id==$articulo->marca_id ? 'selected':''}}>{{$marca->marca}}</option>     
            @else
                <option value="{{ $marca->id }}" {{ old('marca_id') == $marca->id ? 'selected':'' }} >{{ $marca->marca }}</option>
            @endisset 
        @endforeach
    </select>
    <label for="floatingInput">Marca</label>
</div>

<input hidden class="form-control" type="text" name="cliente_id" value="{{ $cliente->id }}">

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
    @if($errors->has('tipoarticulo_id'))
        <span class="text-danger"> {{ $errors->first('tipoarticulo_id')}}</span>
    @endif
</div>
<div class="form-floating mb-3">
    <select class="form-control @error('tipoarticulo_id') is-invalid @enderror" data-old="{{ old('tipoarticulo_id') }}" name="tipoarticulo_id" id="country">
        <option value="" selected> Elija una Marca</option>
        @foreach ($tipoarticulos as $tipoarticulo)
            @isset($articulo)     
                <option  value="{{$tipoarticulo->id}}" {{$tipoarticulo->id==$articulo->tipoarticulo_id ? 'selected':''}}>{{$tipoarticulo->tipoarticulo}}</option>     
            @else
                <option value="{{ $tipoarticulo->id }}" {{ old('tipoarticulo_id') == $tipoarticulo->id ? 'selected':'' }} >{{ $tipoarticulo->tipoarticulo }}</option>
            @endisset 
        @endforeach
    </select>
    <label for="floatingInput">Tipoarticulo</label>
</div>
