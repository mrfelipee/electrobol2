
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
    @if($errors->has('nombre'))
        <span class="text-danger"> {{ $errors->first('nombre')}}</span>
    @endif
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control" id="floatingInput" name="nombre" value="{{old('nombre',$persona->nombre ?? '')}}" placeholder="NOMBRES">
    <label for="floatingInput">NOMBRE</label>
    @error('tipomotivo') is-invalid @enderror
</div>


<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
    @if($errors->has('apellidos'))
        <span class="text-danger"> {{ $errors->first('apellidos')}}</span>
    @endif
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="floatingInput" name="apellidos" value="{{old('apellidos',$persona->apellidos ?? '')}}" placeholder="APELLIDOS">
    <label for="floatingInput">APELLIDOS</label>
    @error('tipomotivo') is-invalid @enderror
</div>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
    @if($errors->has('direccion'))
        <span class="text-danger"> {{ $errors->first('direccion')}}</span>
    @endif
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="floatingInput" name="direccion" value="{{old('direccion',$persona->direccion ?? '')}}" placeholder="DIRECCION">
    <label for="floatingInput">DIRECCION</label>
</div>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
    @if($errors->has('carnet'))
        <span class="text-danger"> {{ $errors->first('carnet')}}</span>
    @endif
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="floatingInput" name="carnet" value="{{old('carnet',$persona->carnet ?? '')}}" placeholder="carnet">
    <label for="floatingInput">carnet</label>
</div>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
    @if($errors->has('rol'))
        <span class="text-danger"> {{ $errors->first('rol')}}</span>
    @endif
</div>

<div class="form-floating">
    <select class="form-control @error('rol') is-invalid @enderror" name="rol" id="rol">
        <option value=""> Elije un rol</option>
        @isset($persona)
                @isset($persona->cliente)
                    <option value="cliente" selected> cliente</option>
                    <option value="tecnico">tecnico</option>
                @endif 
                @isset($persona->tecnico)
                
                    <option value="tecnico" selected >Tecnico</option>
                    <option value="cliente">cliente</option>
                @endif
        @else 
            
            <option value="tecnico">Tecnico</option>
            <option value="cliente">cliente</option>
        @endisset    
    </select>
</div>




