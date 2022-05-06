
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
    @if($errors->has('tipoarticulo'))
        <span class="text-danger"> {{ $errors->first('tipoarticulo')}}</span>
    @endif
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control @error('tipoarticulo') is-invalid @enderror" id="floatingInput" name="tipoarticulo" value="{{old('tipoarticulo',$tipoarticulo->tipoarticulo ?? '')}}" placeholder="tipoarticulo">
    <label for="floatingInput">tipoarticulo</label>
</div>
