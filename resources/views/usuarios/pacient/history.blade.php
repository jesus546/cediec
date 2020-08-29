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
      body{
        margin: 0;
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
                    <td colspan="2"><strong>Fecha:</strong> {{ carbon_format($usuario->clinic_data('check_in', $datas), 'd/m/Y')}}</td>
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
                    <td colspan="2"><strong>Acompañante:</strong>@if (!is_null($usuario->clinic_data('acompañante', $datas))) {{ ucwords($usuario->clinic_data('acompañante', $datas)) }} @else n/a @endif</td>
                    <td colspan="2"><strong>Telefono:</strong> @if (!is_null($usuario->clinic_data('telefono', $datas))) {{ $usuario->clinic_data('telefono', $datas) }} @else n/a @endif &nbsp;&nbsp; <strong>Parentezco:</strong> @if (!is_null($usuario->clinic_data('fk_parentezco', $datas))) {{ $usuario->clinic_data('fk_parentezco', $datas) }} @else n/a @endif</td>
                  </tr>
                  <tr>
                    <td colspan="4"><br></td>
              
                  </tr>
                  <tr>
                    <th colspan="4"> <h5 class="text-center">Motivo De Consulta</h5></th>
                  </tr>
                  <tr>
                     <td colspan="4" class="one">
                   
                        {{ ucfirst($usuario->clinic_data('motivo_consulta', $datas)) }}
                       
                     </td>
                  </tr>
                  <tr>
                    <th colspan="4"> <h5 class="text-center">Enfermedad Actual</h5></th>
                  </tr>
                  <tr>
                     <td colspan="4" class="one">
                  
                      {{ ucfirst($usuario->clinic_data('enfermedad_actual', $datas)) }}
                   
                     </td>
                  </tr>
                  <tr>
                    <th colspan="4"> <h5 class="text-center">Examen Fisico</h5></th>
                  </tr>
                  <tr >
                    <td ><strong>Talla(cms):</strong> @if (!is_null($usuario->clinic_data('talla', $datas)))  {{ $usuario->clinic_data('talla', $datas) }} @else n/a @endif </td>
                    <td ><strong>Peso(Kg): </strong>@if(!is_null( $usuario->clinic_data('peso', $datas) )) {{ $usuario->clinic_data('peso', $datas) }}@else n/a @endif </td>
                    <td ><strong>IMC: </strong>@if (!is_null($usuario->clinic_data('IMC', $datas))) {{ $usuario->clinic_data('IMC', $datas) }}@else n/a @endif</td>
                    <td><strong>T°:</strong>@if (!is_null($usuario->clinic_data('IMC', $datas))) {{ $usuario->clinic_data('temperatura', $datas) }}@else n/a @endif </td>
                  </tr>
                  <tr >
                    <td><strong>PA(mmHg): </strong>@if (!is_null($usuario->clinic_data('presion-arterial', $datas))) {{ $usuario->clinic_data('presion-arterial', $datas) }}@else n/a @endif </td>
                    <td><strong>FR: </strong>@if (!is_null($usuario->clinic_data('frecuencia-respiratoria', $datas))) {{ $usuario->clinic_data('frecuencia-respiratoria', $datas) }}@else n/a @endif</td>
                    <td><strong>FC(L/mln): </strong>@if (!is_null($usuario->clinic_data('frecuencia-cardiaca', $datas))) {{ $usuario->clinic_data('frecuencia-cardiaca', $datas) }}@else n/a @endif </td>
                    <td><strong>P.ABD(cms): </strong>@if (!is_null($usuario->clinic_data('P.ABD', $datas))) {{ $usuario->clinic_data('P.ABD', $datas) }} @else n/a @endif</td>
                  </tr>
                  <tr>
                    <td colspan="4"><br></td>
                  </tr>
                  <tr >
                    <td colspan="2" ><strong>ORL:</strong> @if (!is_null($usuario->clinic_data('orl', $datas))) {{ ucfirst( $usuario->clinic_data('orl', $datas) )}} @else Sin Alteraciones @endif </td>
                    <td colspan="2"><strong>Ojos:</strong> @if (!is_null($usuario->clinic_data('ojos', $datas))) {{ucfirst( $usuario->clinic_data('ojos', $datas)) }}@else Sin Alteraciones @endif </td>
                  </tr>
                  <tr >
                    <td colspan="2"><strong>Cardio Vascular:</strong>@if (!is_null($usuario->clinic_data('cardio-vascular', $datas))) {{ ucfirst($usuario->clinic_data('cardio-vascular', $datas))  }}@else Sin Alteraciones @endif </td>
                    <td colspan="2"><strong>Cuello:</strong>@if (!is_null($usuario->clinic_data('cuello', $datas))) {{ ucfirst( $usuario->clinic_data('cuello', $datas) )}}@else Sin Alteraciones @endif  </td>
                  </tr>
                  <tr>
                    <td colspan="2"><strong>Genito Urinario:</strong>@if (!is_null($usuario->clinic_data('genito-urinario', $datas))) {{ ucfirst($usuario->clinic_data('genito-urinario', $datas)) }}@else Sin Alteraciones @endif</td>
                    <td colspan="2"><strong>Extremidades:</strong>@if (!is_null($usuario->clinic_data('extremidades', $datas))) {{ ucfirst($usuario->clinic_data('extremidades', $datas)) }}@else Sin Alteraciones @endif  </td>
                  </tr>

                  <tr>
                     <td colspan="2"><strong>Piel Y Anexos:</strong>@if (!is_null($usuario->clinic_data('piel_anexos', $datas))) {{ ucfirst($usuario->clinic_data('piel_anexos', $datas) )}}@else Sin Alteraciones @endif  </td>
                     <td colspan="2"><strong>Pulmonar:</strong>@if (!is_null($usuario->clinic_data('pulmonar', $datas))) {{ ucfirst($usuario->clinic_data('pulmonar', $datas) )}}@else Sin Alteraciones @endif</td>
                    </tr>
                  <tr>
                    <td colspan="2"><strong>Musculo Esqueletico:</strong>@if (!is_null($usuario->clinic_data('musculo-esqueletico', $datas))) {{ ucfirst($usuario->clinic_data('musculo-esqueletico', $datas)) }}@else Sin Alteraciones @endif </td>
                    <td colspan="2"><strong>Neurologico:</strong>@if (!is_null($usuario->clinic_data('neurologico', $datas))) {{ ucfirst($usuario->clinic_data('neurologico', $datas)) }}@else Sin Alteraciones @endif </td>
                  </tr>

                  <tr>
                    <td colspan="2"><strong>Otros:</strong>@if (!is_null($usuario->clinic_data('otros', $datas))) {{ ucfirst($usuario->clinic_data('otros', $datas)) }}@else Sin Alteraciones @endif</td>
                    <td  colspan="2"><br></td>
                  </tr>
                  <tr>
                    <th colspan="4"><h5 class="text-center">Podología</h5></th>
                  </tr>
                  <tr>
                    <td colspan="2" ><strong>Amputacion:</strong> @if (!is_null($usuario->clinic_data('amputacion', $datas)))  {{ ucfirst($usuario->clinic_data('amputacion', $datas)) }} @else n/a @endif </td>
                    <td colspan="2"><strong>Sensibilidad Plantar: </strong>@if (!is_null($usuario->clinic_data('sensibilidad-Plantar', $datas))) {{ ucfirst($usuario->clinic_data('sensibilidad-Plantar', $datas)) }} @else n/a  @endif</td>
                  </tr>

                  <tr>
                    <td colspan="2" ><strong>Pulsos: </strong>@if(!is_null( $usuario->clinic_data('pulso', $datas) )) {{ ucfirst($usuario->clinic_data('pulso', $datas)) }}@else n/a @endif </td>
                    <td colspan="2"><strong>Piel:</strong>@if (!is_null($usuario->clinic_data('piel', $datas))) {{ucfirst( $usuario->clinic_data('piel', $datas)) }}@else n/a @endif </td>
                  </tr>
                  
                  <tr>
                    <td colspan="2" ><strong>Alteracion Biomecanica: </strong>@if (!is_null($usuario->clinic_data('alteracion-biomecanica', $datas))) {{ ucfirst($usuario->clinic_data('alteracion-biomecanica', $datas)) }}@else n/a @endif  </td>
                    <td colspan="2"><strong>Uñas(micosis): </strong>@if (!is_null($usuario->clinic_data('uñas', $datas))) {{ ucfirst($usuario->clinic_data('uñas', $datas)) }}@else n/a @endif </td>
                  </tr>

           
              
                  
                </tbody>
              </table>
              
              
              
  
           
              

 
</body>
</html>