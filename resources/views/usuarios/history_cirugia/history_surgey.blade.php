<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>historia clinica</title>

<link rel="stylesheet" href="{{asset("dist/css/adminlte.css")}}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style>
body {
¨ margin: 0;
  padding: 0;
}



td {
  text-align: justify;
  align-items: stretch;
}


</style>
</head>
<body>

<img src="{{asset('img/logoHistory.png')}}" alt="imagen cediec" width="180" height="50">

    <h3 class="float-right">
        {{'Historía Clinica'}}
    </h3>
    <br>
    <br>

      <table style="width: 100%;" cellpadding="4">
        <tbody>
          <tr>
            <td colspan="2"><strong>Fecha:</strong> @if (isset($surgery->created_at)) {{$surgery->created_at->format('Y/m/d')}} @else n/a @endif</td>
            <td colspan="2"><br></td>
          </tr>
          <tr>
            <td colspan="2"><strong>Nombres: </strong>@if (isset($usuario->nombres))  {{ucwords($usuario->nombres)}} @else n/a @endif</td>
            <td colspan="2"><strong>Tipo Doc: </strong>@if (isset($usuario->type_identificacion_id()->tipo)) {{$usuario->type_identificacion_id()->tipo . ' '}} @else n/a @endif</td>
            
          </tr>

          <tr>
            <td colspan="2"><strong>Apellidos: </strong> @if (isset($usuario->apellidos))  {{ucwords($usuario->apellidos)}} @else n/a @endif</td>
            <td colspan="2"><strong>Documento: </strong>@if (isset($usuario->identificacion)) {{$usuario->identificacion}}@else n/a @endif</td>
            
          </tr>

          <tr>
            <td colspan="2"><strong>Fecha de nacimiento: </strong>@if (isset($usuario->fechaDeNacimiento)) {{$usuario->fechaDeNacimiento->format('Y-m-d')}} @else n/a @endif</td>
            <td colspan="2"><strong>Edad: </strong>{{$usuario->age()}}&nbsp;&nbsp;<strong>Sexo:</strong>@if (isset($usuario->genero)) {{$usuario->genero}}&nbsp;&nbsp;@else n/a &nbsp;&nbsp;@endif<strong>RH:</strong> @if (isset($usuario->RH_id()->r)) {{$usuario->RH_id()->r}}@else n/a @endif</td>
            
          </tr>
          <tr>
            <td colspan="2"><strong>Cel: </strong> {{$usuario->celular}}</td>
            <td colspan="2"><strong>Tel: </strong>@if (isset($usuario->telefono))  {{$usuario->telefono}}&nbsp;&nbsp; @else n/a&nbsp;&nbsp; @endif<strong>Religión:</strong>@if (isset($usuario->religion_id()->religion)) {{$usuario->religion_id()->religion}} @else n/a @endif</td>
            
          </tr>

          <tr>
            <td colspan="2"><strong>Dirección: </strong>@if (isset($usuario->direccion)) {{ucwords($usuario->direccion)}} @else n/a @endif</td>
            <td colspan="2"><strong>Zona: </strong>@if (isset($usuario->zona)) {{$usuario->zona}} &nbsp;&nbsp;@else n/a &nbsp;&nbsp; @endif<strong>Estado Civil: </strong> @if (isset($usuario->fk_estadoCivil)) {{$usuario->fk_estadoCivil}}@else n/a @endif</td>
          </tr>

          <tr>
              <td colspan="2"><strong>Municipio:</strong>@if (isset($usuario->municipio_id()->nombre)) {{$usuario->municipio_id()->nombre}} @else n/a @endif</td>
              <td colspan="2"><strong>Departamento:</strong>@if (isset($usuario->departamento_id()->nombre)) {{$usuario->departamento_id()->nombre}} @else n/a @endif</td>
          </tr>
          <tr>
            <td colspan="2"><strong>Escolaridad:</strong>@if (isset($usuario->nivelEducativo_id()->nivel)) {{$usuario->nivelEducativo_id()->nivel}} @else n/a @endif</td>
            <td colspan="2"><strong>Ocupación:</strong>@if (isset($usuario->ocupacion)) {{ucwords($usuario->ocupacion)}} @else n/a @endif</td>
          </tr>
          <tr>
            <td colspan="2"><strong>Tipo De Aseguradora:</strong> @if (isset($usuario->type_aseguradora_id()->tipoAsegu)) {{$usuario->type_aseguradora_id()->tipoAsegu}} @else n/a @endif</td>
            <td colspan="2"><strong>Aseguradora:</strong> @if (isset($usuario->aseguradora_id()->asegu)) {{$usuario->aseguradora_id()->asegu}} @else n/a @endif</td>
          </tr>
          <tr>
            <td colspan="2"><strong>Regimen:</strong> @if (isset($usuario->regime_id()->name)) {{$usuario->regime_id()->name}} @else n/a @endif</td>
            <td colspan="2"><strong>Discapacidad:</strong> @if (isset($usuario->discapacidad_id()->discapacidad)) {{$usuario->discapacidad_id()->discapacidad}} @else n/a @endif</td>
          </tr>

          <tr>
            <td colspan="2"><strong>Grupo Etnico:</strong>@if (isset($usuario->grupoEtnico_id()->grupo)) {{$usuario->grupoEtnico_id()->grupo}} @else n/a @endif</td>
            <td colspan="2"><strong>Poblacion Riesgo:</strong>@if (isset($usuario->poblacionRiesgo_id()->poblaRies)) {{$usuario->poblacionRiesgo_id()->poblaRies}} @else n/a @endif</td>
          </tr>
          <tr>
            <td colspan="2"><strong>Responsable:</strong>@if (isset($usuario->nombre_del_responsable)) {{ucwords($usuario->nombre_del_responsable)}} @else n/a @endif</td>
            <td colspan="2"><strong>Telefono:</strong>@if (isset($usuario->telefono_r)) {{$usuario->telefono_r}}&nbsp;&nbsp; @else n/a &nbsp;&nbsp;@endif <strong>Parentezco:</strong>@if (isset($usuario->fk_parentezco)) {{$usuario->fk_parentezco}} @else n/a @endif</td>
          </tr>

        
          <tr>
            <td colspan="4"><br></td>
      
          </tr>
          
          <tr>
                <td><strong> H.I.V:</strong> @if (isset($surgery->H_i_v)) {{ucfirst($surgery->H_i_v)}} @else n/a @endif</td>
                <td><strong> TABAQUISMO:</strong> @if (isset($surgery->tabaquismo)) {{ucfirst($surgery->tabaquismo)}} @else n/a @endif</td>
                <td><strong>DIABETES:</strong> @if (isset($surgery->diabetes)) {{ucfirst($surgery->diabetes)}} @else n/a @endif</td>
                <td><strong>HEPATITIS:</strong> @if (isset($surgery->hepatitis)) {{ucfirst($surgery->hepatitis)}} @else n/a @endif</td>
          </tr>
          <tr>
            <td colspan="2"><strong > CARDIOPATIAS:</strong> @if (isset($surgery->cardiopatias)) {{ucfirst($surgery->cardiopatias)}} @else n/a @endif</td>
            <td><strong> ALERGIAS:</strong> @if (isset($surgery->alergias)) {{ucfirst($surgery->alergias)}} @else n/a @endif</td>
            <td><strong>H.T.A:</strong> @if (isset($surgery->H_T_A)) {{ucfirst($surgery->H_T_A)}} @else n/a @endif</td>
        </tr>
          <tr>
              <td colspan="4"> <strong>M.C:</strong> @if (isset($surgery->MC)) {{ucfirst($surgery->MC)}} @else n/a @endif</td>
          </tr>
          <tr>
            <td colspan="4"> <strong>E.E.A:</strong> @if (isset($surgery->E_E_A)) {{ucfirst($surgery->E_E_A)}} @else n/a @endif</td>
        </tr>
        <tr>
            <td colspan="4"> <strong>EXAMEN FISICO:</strong> @if (isset($surgery->examen_fisico)) {{ucfirst($surgery->examen_fisico)}} @else n/a @endif</td>
        </tr>
        <tr>
            <td colspan="4"> <strong>DIAGNOSTICO:</strong> @if (isset($surgery->diagnostico)) {{ucfirst($surgery->diagnostico)}} @else n/a @endif</td>
        </tr>
        <tr>
            <td colspan="4"> <strong>CONDUCTA:</strong> @if (isset($surgery->conducta)) {{ucfirst($surgery->conducta)}} @else n/a @endif</td>
          </tr>
          
        </tbody>
      </table>
      
      
              
  
           