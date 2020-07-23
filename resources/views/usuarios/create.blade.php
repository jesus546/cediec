@extends('themes/layaoutT')

@section('style')
<link rel="stylesheet" href="{{asset("plugins/select2/css/select2.min.css")}}">

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
    <form role="form" action="{{url('/usuarios')}}" method="POST">
      @csrf
      @include('themes.includes.user.usuarios.form_usuario')
        <!-- /.card-body -->
        <div class="card-footer">
        <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </div>
  
        
      </form>
    </div>
  </div>
  
</div>


@endsection

