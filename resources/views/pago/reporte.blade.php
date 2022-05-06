<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('custom/css/reporte.css')}}">
</head>
<body>
    <div>
        <span> <strong> Cliente:</span></strong> {{$persona->nombre.' '.$persona->apellidos}}<br>
        <span> <strong> Tecnico:</span></strong> {{$tecnico->persona->nombre.' '.$tecnico->persona->apellidos}}<br>
        <span> <strong> Costo Total:</span></strong>{{'Bs. '.$reparacion->costo}}<br>
        <span> <strong> Acuenta:</span></strong> {{'Bs. '.$acuenta}}<br>
        <span> <strong> Saldo:</span></strong> {{'Bs. '.$reparacion->costo-$acuenta}}<br>
        <span> <strong> Problema:</span></strong> {!!$reparacion->problema!!}<br>
        <span> <strong> Evaluacion:</span></strong> {!!$reparacion->evaluaciones()->first()->evaluacion!!}<br>
        
    </div>

    <br>  
    <div class="divtabla">
        <table class="tabla">
            <thead class="">
                <tr>
                    <th>DESCRIPCION</th>
                    <th>FECHA HORA</th>
                    <th>MONTO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pagos as $pago)
                    <tr>
                        <td>{{ $pago->descripcion }}</td>
                        <td>{{ $pago->created_at }}</td>
                        <td>{{ $pago->monto }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2">Total</td>
                    <td>{{$acuenta}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>