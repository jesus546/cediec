@extends('themes/layaoutT')
@section('style')
    <style>
       .permission {
        background-color: rgb(226, 210, 63); 
       }
       .permission:hover {
        background-color: rgb(156, 141, 8); 
       }
    </style>
@endsection
@section('cont')
<div class="row ">
    <div class="col-10 " style="margin:auto">
      <div class="card">
        <div class="card-header ">
          <h3 class="card-title">Empleados</h3>

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
                <th>Email</th>
                <th>Rol</th>
                <th>
              
                <a href="{{route('empleados.create')}}" class="btn btn-success btn-sm float-right">Agregar Empleado</a>
                
                </th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($empleados as $empleado)
              <tr>
                <td scope="row">{{$empleado->identificacion}}</td>
                <td>{{$empleado->nombres}}</td>
                <td>{{$empleado->email}}</td>
                <td>{{$empleado->getRoleNames()->implode(', ')}}</td>
                <td>
                  
                  <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-folder"></i></a>
                  <a class="btn permission btn-sm" href="{{route('empleados.asignar_permission', $empleado)}}" ><i class="fas fa-scroll"></i></a>
                  <a class="btn btn-info btn-sm" href="{{url('/empleados/' . $empleado->id . '/edit/')}}" ><i class="fas fa-pencil-alt"></i> </a>
                    @if ($empleado->hasRole('Doctor'))
                     <a class="btn btn-primary btn-sm" href="{{route('empleados.asignar_speciality', $empleado)}}"><i class="fab fa-medrt"></i></a>
                     <a class="btn btn-primary btn-sm" href="{{route('pacient.appointments.doctor.show', $empleado)}}"><i class="fas fa-clock"></i></a>
                    @endif
        
                  <form action="{{route('empleados.destroy', $empleado->id)}}" method="POST" style="display:inline-block;">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>
                    </form>
               
                 
                             
                </td>
              </tr>
              @endforeach
              
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection