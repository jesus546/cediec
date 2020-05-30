@extends('themes.layaoutT')

@section('cont')
<div class="row ">
    <div class="col-8 " style="margin:auto">
      <div class="card">
        <div class="card-header bg-blue">
          <h3 class="card-title"> Permisos Del Sistema</h3>
   
        </div>
     
        <!-- /.card-header -->
        <div class="card-body table-responsive  p-0">
          <table class="table table-hover  text-nowrap">
            <thead >
              <tr>
                <th>Nombre</th>
                <th>Slug</th>
                <th>Descripción</th>
                <th>Rol</th>
                <th><a href="{{route('permissions.create')}}" class="btn btn-success btn-sm float-right">Crear Permisos</a></th>
                
              </tr>
            </thead>
            <tbody>  
            @foreach ($permissions as $permissions)
            <tr>
                <td scope="row">{{$permissions->name}}</td>
                <td>{{$permissions->slug}}</td>
                <td>{{$permissions->description}}</td>
                 <td>{{$permissions->roles_id}}</td>
                <td>
                 <a class="btn btn-info btn-sm" href="{{route('permissions.edit', $permissions)}}" ><i class="fas fa-pencil-alt"></i> </a>
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
  <form action="{{route('permissions.destroy', $permissions)}}" method="POST" name="delete_form" ">
    @method('DELETE')
    @csrf
  </form> 

@endsection

@section('script')
    <script >
      function enviar_formulario()
        {
          swal({
            title: "¿Desea eliminar este permiso?",
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
                   'Permiso no eliminado',
                   'error'
                 );
              }
           });
        }
    </script>
@endsection