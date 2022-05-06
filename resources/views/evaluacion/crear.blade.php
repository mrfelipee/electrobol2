@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                EVALUACION CREATE
            </div>

            {{-- {{$reparacion}} --}}

            <div class="card-body">
                <form method="post" action="{{ route('evaluacion.guardar') }}">
                    @csrf
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        @if($errors->has('evaluacion'))
                            <span class="text-danger"> {{ $errors->first('evaluacion')}}</span>
                        @endif
                    </div>
                    <textarea class="form-control  @error('evaluacion') is-invalid @enderror" id="evaluacion" name="evaluacion"></textarea>

                    <input hidden class="form-control" type="text" name="reparacion_id" value="{{ $reparacion->id }}">

                    @include('include.boton')
                    <a href="{{ route('persona.index')}}">Omitir</a>
                </form>
            </div>
        </div>
            
    </div>
@stop




@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
    CKEDITOR.replace( 'evaluacion' );
    </script>
@stop
