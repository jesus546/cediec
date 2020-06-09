@extends('themes.layaoutT')

@section('style')
<link rel="stylesheet" href="{{asset('plugins/pickerdata/themes/default.date.css')}}">
<link rel="stylesheet" href="{{asset('plugins/pickerdata/themes/default.time.css')}}">
<link rel="stylesheet" href="{{asset('plugins/pickerdata/themes/default.css')}}">
@endsection

@section('cont')

<div class="col-md-9" style="margin: auto">
  <div class="card card-info " >
      <div class="card-header">
          
      <h3 class="card-title">Asignar cita a {{$usuario->nombres}}</h3>
      
      </div>
    @include('themes.includes.user.form_schedule')
  
</div>
</div>
@endsection

@section('script')

@include('themes.includes.user.foot_schedule')
@endsection