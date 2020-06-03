@extends('themes.layaoutT')

@section('cont')
<div class="row ">
    <div class="col-8 " style="margin:auto">
      <div class="card">
        <div class="card-header bg-blue">
         
          <h3 class="card-title">Citas de {{$usuario->nombres}}</h3>
   
        </div>
     
        <!-- /.card-header -->
        <div class="card-body table-responsive  p-0">
          <table class="table table-hover  text-nowrap">
            <thead >
              <tr>
                <th>Id</th>
                <th>Especialista</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th><a class="btn btn-success btn-sm float-right" href="{{url('/pacient/' . $usuario->id . '/schedule/')}}" >Asignar cita </a></th>

                
              </tr>
            </thead>
            <tbody>  
              <tr>
                <td scope="row">1</td>
                <td>asd</td>
                <td>ada</td>
                <td>adsa</td>
                <td>ad</td>
              </tr>  
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection