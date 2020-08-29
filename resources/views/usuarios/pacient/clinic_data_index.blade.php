@extends('themes/layaoutT')


@section('cont')


<div class="card card-default">
    <div class="card-header">
        <h3 class="card-title">
            {{'Historia Clinica De '. ucwords($usuario->nombres)}}
        </h3>
        
        <a class="btn btn-success btn-sm float-right" href="{{route('clinic_data.create', $usuario)}}"> Crear y/o Actualizar Historia Clinica</a>
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
        <br>
        <br>
    <div class="row no-print">
      <div class="col-12">
        <a href="#" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
    
        <a href="{{route('pdf_historia', $usuario)}}" class="btn btn-primary float-right" style="margin-right: 5px;">
          <i class="fas fa-download"></i> Generar PDF
        </a>
      </div>
      </div> 
</div>
@endsection
