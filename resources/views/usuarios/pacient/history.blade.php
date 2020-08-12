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
             <article>
            <strong>Nombres: </strong>@if (isset($usuario->nombres))  {{ucwords($usuario->nombres)}} @else n/a @endif<br>
            <strong>Apellidos: </strong> @if (isset($usuario->apellidos))  {{ucwords($usuario->apellidos)}} @else n/a @endif<br>
             <strong>Fecha de nacimiento: </strong>@if (isset($usuario->fechaDeNacimiento)) {{$usuario->fechaDeNacimiento->format('Y-m-d')}} @else n/a @endif<br>
             <strong>Edad: </strong> {{$usuario->age()}}&nbsp;&nbsp; <strong>Departamento:</strong>@if (isset($usuario->departamento_id()->nombre)) {{$usuario->departamento_id()->nombre}} @else n/a @endif &nbsp;&nbsp;
             <strong>Municipio:</strong>@if (isset($usuario->municipio_id()->nombre)) {{$usuario->municipio_id()->nombre}} @else n/a @endif <br> 
             <strong>Dirección: </strong>@if (isset($usuario->direccion)) {{ucwords($usuario->direccion)}} @else n/a @endif &nbsp;&nbsp;<strong>Zona: </strong>@if (isset($usuario->zona)) {{$usuario->zona}}@else n/a @endif &nbsp;&nbsp;  <strong>Genero:</strong>@if (isset($usuario->genero)) {{$usuario->genero}}@else n/a @endif <br>
             </article>
          </div>
         
      
          <div class="" style="margin-left: 290px">
            <article>
              <strong>Tipo Doc: </strong>@if (isset($usuario->type_identificacion_id()->tipo)) {{$usuario->type_identificacion_id()->tipo . ' '}} @else n/a @endif <br> 
              <strong>Documento: </strong>@if (isset($usuario->identificacion)) {{$usuario->identificacion}}@else n/a @endif &nbsp;&nbsp;&nbsp;&nbsp;   <strong>Estado Civil: </strong> {{$usuario->fk_estadoCivil}}<br>
              <strong>Cel: </strong> {{$usuario->celular}}&nbsp;&nbsp; <strong>Tel: </strong> {{$usuario->telefono}}&nbsp;&nbsp; <strong>RH:</strong> @if (isset($usuario->RH_id()->r)) {{$usuario->RH_id()->r}}@else n/a @endif <br>
                
            </article>           
       
          </div>
          
        </div>
 
</body>
</html>