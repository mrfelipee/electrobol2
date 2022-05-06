
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
    @if($errors->has('marca'))
        <span class="text-danger"> {{ $errors->first('marca')}}</span>
    @endif
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control @error('marca') is-invalid @enderror" id="floatingInput" name="marca" value="{{old('marca',$marca->marca ?? '')}}" placeholder="marcaS">
    <label for="floatingInput">Marca</label>
</div>
