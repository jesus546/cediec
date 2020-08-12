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
      <p><strong>Departamento: </strong> @if (isset($usuario->departamento_id()->nombre)) {{$usuario->departamento_id()->nombre}}
      @else n/a @endif </p>
    <p><strong>Fecha de alta: </strong> {{ carbon_format($usuario->clinic_data('check_in', $datas), 'd/m/Y') }}</p>
    <p><strong>Escolaridad: </strong>{{ $usuario->clinic_data('scholarship', $datas) }}</p>
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
