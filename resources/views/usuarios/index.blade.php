@extends('themes/layaoutT')

@section('cont')
<div class="row ">
    <div class="col-10 " style="margin:auto">
      <div class="card">
        <div class="card-header ">
          <h3 class="card-title">Usuarios</h3>

          <div class="card-tools">
            <form>
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="search" type="search" class="form-control float-right" placeholder="Search">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </form>             
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
                @can('registrar usuario')
                <a href="{{url('usuarios/create')}}" class="btn btn-success btn-sm float-right">Agregar Usuarios</a>
                
                @endcan
                
                </th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $usuario)
              <tr>
                <input type="hidden" class="dele_user_value" value="{{$usuario->id}}">
                <td scope="row">{{$usuario->identificacion}}</td>
                <td>{{$usuario->nombres}}</td>
                <td>{{$usuario->age()}}</td>
                <td>{{$usuario->email}}</td>
                <td>
                  
                  <a class="btn btn-primary btn-sm" href="{{route('clinic_data.create', $usuario)}}"><i class="fas fa-folder"></i></a>
                  @can('listar cita paciente')
                  <a class="btn btn-info btn-sm" href="{{route('pacient.appointments', $usuario)}}"   ><i class="fas fa-book" ></i> </a>
                  @endcan
                  @can('ver factura paciente')
                  <a class="btn btn-info btn-sm" href="{{route('back.invoice', $usuario)}}"   ><i class=" nav-icon fas fa-file-invoice"></i></a>
                  @endcan
                  
                  @can('editar usuario')
                  <a class="btn btn-info btn-sm" href="{{route('usuarios.edit', $usuario)}}" ><i class="fas fa-pencil-alt"></i> </a>
                  @endcan
        
                  
                  @can('eliminar usuario')
                  <button class="btn btn-danger btn-sm delete_user" type="button" ><i class="fas fa-trash"></i></button>
                  @endcan
                             
                </td>
              </tr>
              @endforeach
              
              
            </tbody>
          </table>
        </div>
        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
             {{$users->links()}}
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
    <script>
      $.ajaxSetup({
          headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

       $('.delete_user').click(function(e){
         e.preventDefault();
         var delete_id = $(this).closest('tr').find('.dele_user_value').val();
        swal({
            title: "esta seguro?",
            text: "una vez eliminado, este usuario no se puede recuperar",
            icon: "warning",
            buttons: true,
            dangerMode: true,
       })
       .then((willDelete) => {
       if (willDelete) {
        
           $.ajax({
              type:"DELETE",
              url: "/usuarios/"+delete_id,
              data: {
                "_token": $('input[name=_token]').val(),
                "id": delete_id,
              },
              success: function (response){
                swal(response.status, {
                          icon: "success",
                })

                 .then((result) => {
                   location.reload();
                });
              }
           });
           
          } 
        });
      });
     
    </script>
@endsection