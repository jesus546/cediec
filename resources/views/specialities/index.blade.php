@extends('themes.layaoutT')

@section('cont')
<div class="row ">
    <div class="col-8 " style="margin:auto">
      <div class="card">
        <div class="card-header bg-blue">
         
          <h3 class="card-title">Especialidades</h3>
   
        </div>
     
        <!-- /.card-header -->
        <div class="card-body table-responsive  p-0">
          <table class="table table-hover  text-nowrap">
            <thead >
              <tr>
                <th>Nombre</th>
                <th># de medicos</th>
                <th>
                  @can('crear especialidad')
                  <a href="{{route('specialities.create')}}" class="btn btn-success btn-xs ">Crear especialidades</a>
                  @endcan
                  </th>
                
                
              </tr>
            </thead>
            <tbody>  
            @foreach ($specialities as $specialities)
            <tr>
                <td scope="row">{{$specialities->name}}</td>
                  <td>{{$specialities->users->count()}}</td>
                  <td>
                    @can('editar especialidad')
                     <a class="btn btn-info btn-sm" href="{{route('specialities.edit', $specialities )}}" ><i class="fas fa-pencil-alt"></i> </a>
                    @endcan

                    @can('eliminar especialidad')
                     <form action="{{route('specialities.destroy', $specialities->id)}}" method="POST" style="display:inline-block;">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash"></i></button>
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