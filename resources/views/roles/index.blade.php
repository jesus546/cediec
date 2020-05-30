@extends('themes.layaoutT')

@section('cont')
<div class="row ">
    <div class="col-8 " style="margin:auto">
      <div class="card">
        <div class="card-header bg-blue">
          <h3 class="card-title"> Roles Del Sistema</h3>
   
        </div>
     
        <!-- /.card-header -->
        <div class="card-body table-responsive  p-0">
          <table class="table table-hover  text-nowrap">
            <thead >
              <tr>
                <th>Nombre</th>
                <th>Slug</th>
                <th>Descripción</th>
                <th><a href="{{route('roles.create')}}" class="btn btn-success btn-sm float-right">Crear Roles</a></th>
                
              </tr>
            </thead>
            <tbody>  
            @foreach ($roles as $roles)
            <tr>
                <td scope="row">{{$roles->name}}</td>
                <td>{{$roles->slug}}</td>
                <td>{{$roles->description}}</td>
                <td>
                  
                    
                 <a class="btn btn-info btn-sm" href="{{route('roles.edit', $roles)}}" ><i class="fas fa-pencil-alt"></i> </a>
                
                  <button class="btn btn-danger btn-sm" onclick="enviar_formulario()" ><i class="fas fa-trash"></i> </button>
                
                            
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
  <form action="{{route('roles.destroy', $roles)}}" method="POST" name="delete_form" style="display:inline-block;">
    @method('DELETE')
    @csrf
  </form> 

@endsection

@section('script')
    <script >
      function enviar_formulario()
        {
          swal({
            title: "¿Desea eliminar este rol?",
            text: "Esta accion no se puede deshacer",
            icon: "warning",
            buttons: {
              cancel: {
                text: "No, Cancelar",
                value: null,
                visible: true,
  
              },
             confirm: {
               text: "Si, Continuar",
               value: true,
               visible: true,
               
              }
            },
           dangerMode: true,
            })
           .then((willDelete) => {
              if (willDelete) {
                 document.delete_form.submit();
              } else {
                 swal(
                   'Operacion cancelada',
                   'Rol no eliminado',
                   'error'
                 );
              }
           });
        }
    </script>
@endsection