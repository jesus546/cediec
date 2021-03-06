@extends('themes.layaoutT')

@section('style')
@include('themes.includes.user.schedule.header_schedule')
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('pacient.appointments', $usuario)}}">Citas de {{ucwords($usuario->nombres)}}</a></li>
<li class="breadcrumb-item active">Asignar Cita</li>
@endsection
@section('cont')

<div class="col-md-9" style="margin: auto">
  <div class="card card-info " >
      <div class="card-header">
          
      <h3 class="card-title">Asignar cita a {{$usuario->nombres}}</h3>
      
      </div>
    @include('themes.includes.user.schedule.form_schedule', [
      'route' => route('pacient.store_back_schedule', $usuario->id)
    ])
  
</div>
</div>
@endsection

@section('script')
 @include('themes.includes.user.schedule.foot_schedule')

@endsection