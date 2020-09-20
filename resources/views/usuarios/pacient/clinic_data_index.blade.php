@extends('themes/layaoutT')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('pacient.files', $usuario)}}">Archivo</a></li>
<li class="breadcrumb-item active">Vista Historia Clinica</li>
@endsection

@section('cont')


<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">
            {{'Historia Clinica De '. ucwords($usuario->nombres)}}
        </h3>
        @role('Doctor')
        @can('crear y/o actualizar historia clinica medicina interna')
        <a class="btn btn-success btn-sm float-right" href="{{route('clinic_data.create', $usuario)}}"> Crear y/o Actualizar Historia Clinica</a>
        @endcan
        @endrole
      </div>
      <div class="card-body">

          <!-- title row -->
          <div class="row">
            <div class="col-12">
              <img src="{{asset('img/logoHistory.png')}}" alt="imagen cediec" width="180" height="50">
                <h3 class="float-right">Historia Clinica</h3>
            </div>
            <!-- /.col -->
          </div>
          <br>
        <div class=" row ">
          <div class="col-sm-6 ">
             <article>
            <strong>Fecha:</strong> {{ carbon_format($usuario->clinic_data('check_in', $datas), 'd/m/Y')}}<br>
            <strong>Nombres: </strong>@if (isset($usuario->nombres))  {{ucwords($usuario->nombres)}} @else n/a @endif<br>
            <strong>Apellidos: </strong> @if (isset($usuario->apellidos))  {{ucwords($usuario->apellidos)}} @else n/a @endif<br>
            <strong>Fecha de nacimiento: </strong>@if (isset($usuario->fechaDeNacimiento)) {{$usuario->fechaDeNacimiento->format('Y-m-d')}} @else n/a @endif<br>
            <strong>Cel: </strong> {{$usuario->celular}}<br>
            <strong>Dirección: </strong>@if (isset($usuario->direccion)) {{ucwords($usuario->direccion)}} @else n/a @endif<br>
            <strong>Municipio:</strong>@if (isset($usuario->municipio_id()->nombre)) {{$usuario->municipio_id()->nombre}} @else n/a @endif <br> 
            <strong>Escolaridad:</strong>@if (isset($usuario->nivelEducativo_id()->nivel)) {{$usuario->nivelEducativo_id()->nivel}} @else n/a @endif <br>
            <strong>Tipo De Aseguradora:</strong> @if (isset($usuario->type_aseguradora_id()->tipoAsegu)) {{$usuario->type_aseguradora_id()->tipoAsegu}} @else n/a @endif <br>
            <strong>Regimen:</strong> @if (isset($usuario->aseguradora_id()->asegu)) {{$usuario->aseguradora_id()->asegu}} @else n/a @endif<br>
            <strong>Grupo Etnico:</strong>@if (isset($usuario->grupoEtnico_id()->grupo)) {{$usuario->grupoEtnico_id()->grupo}} @else n/a @endif<br>
            <strong>Responsable:</strong>@if (isset($usuario->nombre_del_responsable)) {{ucwords($usuario->nombre_del_responsable)}} @else n/a @endif <br>
            <strong>Acompañante:</strong>@if (!is_null($usuario->clinic_data('acompañante', $datas))) {{ ucwords($usuario->clinic_data('acompañante', $datas)) }} @else n/a @endif <br>
          </article>
          </div>
         
      
          <div class="col-sm-6" >
            <article>
              <br>
              <strong>Tipo Doc: </strong>@if (isset($usuario->type_identificacion_id()->tipo)) {{$usuario->type_identificacion_id()->tipo . ' '}} @else n/a @endif  <br> 
              <strong>Documento: </strong>@if (isset($usuario->identificacion)) {{$usuario->identificacion}}@else n/a @endif &nbsp;&nbsp;&nbsp;&nbsp;   <strong>Estado Civil: </strong> @if (isset($usuario->fk_estadoCivil)) {{$usuario->fk_estadoCivil}}@else n/a @endif<br>
              <strong>Edad: </strong> {{$usuario->age()}}&nbsp;&nbsp;  <strong>Sexo:</strong>@if (isset($usuario->genero)) {{$usuario->genero}}@else n/a @endif  &nbsp;&nbsp;  <strong>RH:</strong> @if (isset($usuario->RH_id()->r)) {{$usuario->RH_id()->r}}@else n/a @endif <br>
              <strong>Tel: </strong>@if (isset($usuario->telefono))  {{$usuario->telefono}} @else n/a @endif &nbsp;&nbsp;<strong>Religión:</strong>@if (isset($usuario->religion_id()->religion)) {{$usuario->religion_id()->religion}} @else n/a @endif<br>
              <strong>Zona: </strong>@if (isset($usuario->zona)) {{$usuario->zona}}@else n/a @endif&nbsp;&nbsp;<br>
              <strong>Departamento:</strong>@if (isset($usuario->departamento_id()->nombre)) {{$usuario->departamento_id()->nombre}} @else n/a @endif <br>
              <strong>Ocupación:</strong>@if (isset($usuario->ocupacion)) {{ucwords($usuario->ocupacion)}} @else n/a @endif<br>
              <strong>Aseguradora:</strong> @if (isset($usuario->aseguradora_id()->asegu)) {{$usuario->aseguradora_id()->asegu}} @else n/a @endif<br>
              <strong>Discapacidad:</strong> @if (isset($usuario->discapacidad_id()->discapacidad)) {{$usuario->discapacidad_id()->discapacidad}} @else n/a @endif <br>
              <strong>Poblacion Riesgo:</strong>@if (isset($usuario->poblacionRiesgo_id()->poblaRies)) {{$usuario->poblacionRiesgo_id()->poblaRies}} @else n/a @endif<br>
              <strong>Telefono:</strong>@if (isset($usuario->telefono_r)) {{$usuario->telefono_r}} @else n/a @endif &nbsp;&nbsp; <strong>Parentezco:</strong>@if (isset($usuario->fk_parentezco)) {{$usuario->fk_parentezco}} @else n/a @endif <br>
              <strong>Telefono:</strong> @if (!is_null($usuario->clinic_data('telefono', $datas))) {{ $usuario->clinic_data('telefono', $datas) }} @else n/a @endif &nbsp;&nbsp; <strong>Parentezco:</strong> @if (!is_null($usuario->clinic_data('fk_parentezco', $datas))) {{ $usuario->clinic_data('fk_parentezco', $datas) }} @else n/a @endif <br>
            </article>           
       
          </div>
        </div>
        <br>
        <h4 class="text-center">Motivo De Consulta</h4>
              <p class="text-justify">
               {{ ucfirst($usuario->clinic_data('motivo_consulta', $datas)) }}
              </p>
              <h4 class="text-center">Enfermedad Actual</h4>
              <p class="text-justify">
                {{ ucfirst($usuario->clinic_data('enfermedad_actual', $datas)) }}
              </p>
              <br>
        <table  style="width: 100%;" cellpadding="4">
        <body>
        <tr>
          <th colspan="4"> <h4 class="text-center">Examen Fisico</h4></th>
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
          <td colspan="4" ><strong>ORL:</strong> @if (!is_null($usuario->clinic_data('orl', $datas))) {{ ucfirst( $usuario->clinic_data('orl', $datas) )}} @else Sin Alteraciones @endif </td>
        </tr>
        <tr>
          <td colspan="4"><strong>Ojos:</strong> @if (!is_null($usuario->clinic_data('ojos', $datas))) {{ucfirst( $usuario->clinic_data('ojos', $datas)) }}@else Sin Alteraciones @endif </td>
        </tr>
        <tr>
          <td colspan="4"><strong>Cardio Vascular:</strong>@if (!is_null($usuario->clinic_data('cardio-vascular', $datas))) {{ ucfirst($usuario->clinic_data('cardio-vascular', $datas))  }}@else Sin Alteraciones @endif </td>
        </tr>
        <tr >
          
          <td colspan="4"><strong>Cuello:</strong>@if (!is_null($usuario->clinic_data('cuello', $datas))) {{ ucfirst( $usuario->clinic_data('cuello', $datas) )}}@else Sin Alteraciones @endif  </td>
        </tr>
        <tr>
          <td colspan="4"><strong>Genito Urinario:</strong>@if (!is_null($usuario->clinic_data('genito-urinario', $datas))) {{ ucfirst($usuario->clinic_data('genito-urinario', $datas)) }}@else Sin Alteraciones @endif</td>
          
        </tr>
        <tr>
          <td colspan="4"><strong>Extremidades:</strong>@if (!is_null($usuario->clinic_data('extremidades', $datas))) {{ ucfirst($usuario->clinic_data('extremidades', $datas)) }}@else Sin Alteraciones @endif  </td>
        </tr>
        <tr>
           <td colspan="4"><strong>Piel Y Anexos:</strong>@if (!is_null($usuario->clinic_data('piel_anexos', $datas))) {{ ucfirst($usuario->clinic_data('piel_anexos', $datas) )}}@else Sin Alteraciones @endif  </td>
           
          </tr>
          <tr>
            <td colspan="4"><strong>Pulmonar:</strong>@if (!is_null($usuario->clinic_data('pulmonar', $datas))) {{ ucfirst($usuario->clinic_data('pulmonar', $datas) )}}@else Sin Alteraciones @endif</td>
          </tr>
        <tr>
          <td colspan="4"><strong>Musculo Esqueletico:</strong>@if (!is_null($usuario->clinic_data('musculo-esqueletico', $datas))) {{ ucfirst($usuario->clinic_data('musculo-esqueletico', $datas)) }}@else Sin Alteraciones @endif </td>
          
        </tr>
        <tr>
          <td colspan="4"><strong>Neurologico:</strong>@if (!is_null($usuario->clinic_data('neurologico', $datas))) {{ ucfirst($usuario->clinic_data('neurologico', $datas)) }}@else Sin Alteraciones @endif </td>
        </tr>
        <tr>
          <td colspan="4"><strong>Otros:</strong>@if (!is_null($usuario->clinic_data('otros', $datas))) {{ ucfirst($usuario->clinic_data('otros', $datas)) }}@else Sin Alteraciones @endif</td>
        </tr>
        <tr>
          <th colspan="4"><h4 class="text-center">Podología</h4></th>
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
        <tr>
          <td><br></td>
        </tr>
     

      </tbody>
    </table>
    <br>
    <br>
    <div class="row no-print">
      <div class="col-12">
        <a href="#" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
    
    
      </div>
      </div> 
</div>
@endsection
