@extends('themes/layaoutT')

@section('cont')
<div class="row ">
    <div class="col-10 " style="margin:auto">
      <div class="card">
        <div class="card-header ">
          <h3 class="card-title">Doctores</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>         
          </div>     
        </div>
     
        <!-- /.card-header -->
        <div class="card-body table-responsive  p-0">
          <table class="table table-hover  text-nowrap">
            <thead >
              <tr>
                <th>Identificación</th>
                <th>Nombres</th>
                <th>Edad</th>
                <th>Email</th>
                <th>Acciones</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($empleados as $empleado)
              <tr>
                <td scope="row">{{$empleado->identificacion}}</td>
                <td>{{ucwords($empleado->nombres)}}</td>
                <td>{{$empleado->age()}}</td>
                <td>{{$empleado->email}}</td>
                <td>
                  @can('asignar horario doctor')
                  <a class="btn btn-danger btn-sm " href="{{route('doctor.schedule.assign', $empleado)}}">Asignar horario</i></a>
                  @endcan
                              
                </td>
              </tr>
              @endforeach
              
              
            </tbody>
          </table>
        </div>
        @if ()
            
        @else
            
        @endif
        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
             {{$empleados->links()}}
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection