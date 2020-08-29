@extends('themes/layaoutT')

@section('style')
<link rel="stylesheet" href="{{asset("plugins/select2/css/select2.min.css")}}">

@endsection

@section('cont')
<div class="row">
<div class="col-md-10" style="margin:auto" >
  <div class="card card-primary " >
    <div class="card-header">
      <h3 class="card-title">Editar Empleado {{ucwords($empleado->nombres)}}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    
      <form role="form" action="{{route('empleados.update', $empleado->id)}}"  method="POST">
            @method('PUT')
           @csrf
         @include('themes.includes.empleados.form_empleado')
        
      <!-- /.card-body -->
     
      <div class="card-footer">
      <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
     
     </form>
  </div>
</div>
</div>

@endsection

