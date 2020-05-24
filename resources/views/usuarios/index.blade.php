@extends('themes/layaoutT')

@section('cont')
<div class="row ">
    <div class="col-10 " style="margin:auto">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Usuarios</h3>

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
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Identificacion</th>
                <th>Nombres</th>
                <th>Email</th>
                <th>
                @can('registrar usuario')
                <a href="{{url('usuarios/create')}}"><button type="button" class="btn btn-success float-right">Agregar Usuarios</button></a>
                @endcan
                </th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $usuario)
              <tr>
                <th scope="row">{{$usuario->id}}</td>
                <td>{{$usuario->identificacion}}</td>
                <td>{{$usuario->nombres}}</td>
                <td>{{$usuario->email}}</td>
                <td>
                  <a href="http://"><button type="button" class="btn btn-info">Ver</button></a>
                  @can('editar usuario')
                  <a href="{{url('/usuarios/'.$usuario->id.'/edit/')}}"><button type="button" class="btn btn-primary">Editar</button></a>
                  @endcan
                  
                  @can('eliminar usuario')
                  <form action="{{route('usuarios.destroy', $usuario->id)}}" method="POST" style="display:inline-block;">
                    @method('DELETE')
                    @csrf
                      <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                  @endcan
                  
                    
                </td>
              </tr>
              @endforeach
              
              
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection