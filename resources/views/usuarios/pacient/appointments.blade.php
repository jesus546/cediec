@extends('themes.layaoutT')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('usuarios')}}">Usuarios</a></li>
<li class="breadcrumb-item active">Citas</li>
@endsection
@section('cont')
<div class="row ">
    <div class="col-8 " style="margin:auto">
      <div class="card">
        <div class="card-header bg-blue">
         
          <h3 class="card-title">Citas de {{ucwords($usuario->nombres)}}</h3>
   
        </div>
     
        <!-- /.card-header -->
        @include('themes.includes.user.appointments.form_cita')
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection