<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>history</title>
    <link rel="stylesheet" href="{{asset("dist/css/adminlte.min.css")}}">
</head>
<body>
    <img src="{{asset('img/logo.png')}}" alt="imagen cediec" width="150" height="40">
  
            <h3 class="float-right">
                {{'Historia Clinica'}}
            </h3><br>
   
        <p><strong>Fecha de alta: </strong> {{ carbon_format($usuario->clinic_data('check_in', $datas), 'd/m/Y') }}</p>
        <p><strong>Escolaridad: </strong>{{ $usuario->clinic_data('scholarship', $datas) }}</p>
    
</body>
</html>