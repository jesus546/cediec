<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>history</title>

    <link rel="stylesheet" href="{{asset("dist/css/adminlte.css")}}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

</head>
<body>
  
    <img src="{{asset('img/logo.png')}}" alt="imagen cediec" width="150" height="40">
  
            <h3 class="float-right">
                {{'Historía Clinica'}}
            </h3>
            <br>
            <br>
           
 
        <div class=" row ">
          <div class="">
             <address>
            <strong>Nombres: </strong> {{ucwords($usuario->nombres)}}<br>
            <strong>Apellidos: </strong> {{ucwords($usuario->apellidos)}}<br>
             
             <strong>Fecha de nacimiento: </strong>@if (isset($usuario->fechaDeNacimiento)) {{$usuario->fechaDeNacimiento->format('Y-m-d')}} @else N/A @endif<br>
             <strong>Edad: </strong> {{$usuario->age()}}<br>
            <strong>Genero:</strong> {{$usuario->genero}} <strong>Genero:</strong> {{$usuario->genero}} <strong>Genero:</strong> {{$usuario->genero}} <strong>Genero:</strong> {{$usuario->genero}}
             </address>
          </div>
         
      
          <div class="" style="margin-left: 290px">
            <address>
                <strong>Identificación: </strong> {{$usuario->identificacion}}<br>
                <strong>Estado Civil: </strong> {{$usuario->fk_estadoCivil}}<br>
                <strong>Cel: </strong> {{ucwords($usuario->celular)}}&nbsp;&nbsp; <strong>Tel: </strong> {{$usuario->telefono}}<br>
                <strong>Dirección: </strong> {{ucwords($usuario->direccion). '  '}}&nbsp;&nbsp;<strong>Zona: </strong> {{$usuario->zona}}
            </address>           
       
          </div>
          
        </div>
 
</body>
</html>