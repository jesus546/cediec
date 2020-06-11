@extends('themes.layaoutT')

@section('cont')
<div class="row ">
    <div class="col-8 " style="margin:auto">
      <div class="card">
        <div class="card-header bg-blue">
         
          <h3 class="card-title">Citas de {{$usuario->nombres}}</h3>
   
        </div>
     
        <!-- /.card-header -->
        @include('themes.includes.user.appointments.form_cita')
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection