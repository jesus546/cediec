@extends('themes.layaoutT')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('pacient.appointments', $usuario)}}">Citas de {{ucwords($usuario->nombres)}}</a></li>
<li class="breadcrumb-item active">Editar Cita</li>
@endsection

@section('style')
@include('themes.includes.user.schedule.header_schedule')
@endsection

@section('cont')
<div class="col-md-9" style="margin: auto">
  <div class="card card-info " >
      <div class="card-header">
          
      <h3 class="card-title">Editar cita a {{ucwords($usuario->nombres)}}</h3>
      
      </div>
    @include('themes.includes.user.schedule.form_schedule', [
      'route' => route('pacient.appointments.update', [$usuario,$appointments])
    ])
  
</div>
</div>

   
@endsection

@section('script')

@include('themes.includes.user.schedule.foot_schedule')

@endsection