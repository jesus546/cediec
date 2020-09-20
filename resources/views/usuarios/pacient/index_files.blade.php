@extends('themes.layaoutT')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{url('usuarios')}}">Usuarios</a></li>
<li class="breadcrumb-item active">Archivo</li>
@endsection

@section('cont')
<div class="row ">
    <div class="col-10 " style="margin:auto">
      <div class="card">
        <div class="card-header  bg-info ">
        <h3 class="card-title">Archivos De {{ucwords($usuario->nombres)}}</h3>

            
        </div>
     
        <!-- /.card-header -->
        <div class="card-body table-responsive  p-0">
          <table class="table table-hover  text-nowrap">
           
            <tbody>
        
            <tr>
              <td scope="row">Historia Clinica Medicina Interna</td>
              <td>
                <a href="{{route('clinic_data.index', $usuario)}}"  >Ver </a>          
              </td>
            </tr>
            <tr>
              <td  scope="row">Historia Clinica Cirugía</td>
              <td><a  href="{{route('surgery.index', $usuario)}}">Ver</a></td>
            </tr>
            <tr>
                <td  scope="row">Notas De Evolución</td>
                <td><a  href="{{route('clinic_note.index', $usuario)}}">Ver</a></td>
            </tr>
            

            </tbody>
          </table>
        </div>
        
      </div>
    </div>
  </div>
 
  

@endsection