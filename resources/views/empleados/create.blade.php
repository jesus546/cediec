@extends('themes/layaoutT')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('empleados.index')}}">Empleados</a></li>
<li class="breadcrumb-item active">Crear Empleado</li>
@endsection

@section('cont')
<div class="row">
  <div class="col-md-10" style="margin:auto" >
    <div class="card card-primary " >
      <div class="card-header">
        <h3 class="card-title">Registrar</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
    <form role="form" action="{{route('empleados.store')}}" method="POST">
      @csrf
         @include('themes.includes.empleados.form_empleado')
        <!-- /.card-body -->
        <div class="card-footer">
        <button type="submit" class="btn btn-primary">Crear Empleado</button>
        </div>
  
        
      </form>
    </div>
  </div>
  
</div>


@endsection

