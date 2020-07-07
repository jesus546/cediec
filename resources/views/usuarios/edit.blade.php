@extends('themes/layaoutT')

@section('style')
<link rel="stylesheet" href="{{asset("plugins/select2/css/select2.min.css")}}">

<style>
   .edt{
     background-color: #3639d6d2;
   }
</style>
@endsection

@section('cont')

<div class="row">
<div class="col-md-9" style="margin:auto" >
  <div class="card shadow  " >
    <div class="card-header edt">
    <h3 class="card-title">Editar Usuario {{$usuario->nombres}}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
  <form role="form" action="{{route('usuarios.update', $usuario->id)}}" method="POST">
    @method('PUT')
    @csrf
    @include('themes.includes.user.usuarios.form_usuario')
      <!-- /.card-body -->
     
      <div class="card-footer">
      <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
     
    </form>
  </div>
</div>
</div>


@endsection

