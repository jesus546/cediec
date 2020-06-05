@extends('themes/layaoutT')

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
                <th>Edad</th>
                <th>Email</th>
                <th>
              
                <a href="{{route('empleados.create')}}" class="btn btn-success btn-sm float-right">Agregar Usuarios</a>
                
                </th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($empleados as $empleado)
              <tr>
                <td scope="row">{{$empleado->identificacion}}</td>
                <td>{{$empleado->nombres}}</td>
                <td>{{$empleado->age()}}</td>
                <td>{{$empleado->email}}</td>
                <td>
                  
                  <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-folder"></i></a>
               
                  <a class="btn btn-info btn-sm" href="{{url('/empleados/' . $empleado->id . '/edit/')}}" ><i class="fas fa-pencil-alt"></i> </a>
                    @if ($empleado->hasRole('doctor'))
                     <a class="btn btn-primary btn-sm" href="{{route('empleados.asignar_speciality', $empleado)}}"><i class="fas fa-code-branch"></i></a>
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