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
                <th>Email</th>
                <th>Rol</th>
                <th>
               @can('registrar empleado')
               <a href="{{route('empleados.create')}}" class="btn btn-success btn-sm float-right">Agregar Empleado</a>
               @endcan
              
              
                
                </th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($empleados as $empleado)
              <tr>
                <input type="hidden" class="dele_user_value" value="{{$empleado->id}}">
                <td scope="row">{{$empleado->identificacion}}</td>
                <td>{{ucwords($empleado->nombres)}}</td>
                <td>{{$empleado->email}}</td>
                <td>{{$empleado->getRoleNames()->implode(', ')}}</td>
                <td>
                  
                  <a class="btn btn-primary btn-sm" href="#"><i class="fas fa-folder"></i></a>
                  @can('asignar permisos')
                  <a class="btn permission btn-sm" href="{{route('empleados.asignar_permission', $empleado)}}" ><i class="fas fa-scroll"></i></a>
                  @endcan
                  @can('editar empleado')
                  <a class="btn btn-info btn-sm" href="{{url('/empleados/' . $empleado->id . '/edit/')}}" ><i class="fas fa-pencil-alt"></i> </a>
                  @endcan
                 
                    @if ($empleado->hasRole('Doctor'))
                    @can('asignar especialidad')
                    <a class="btn btn-primary btn-sm" href="{{route('empleados.asignar_speciality', $empleado)}}"><i class="fab fa-medrt"></i></a>
                    @endcan
                    @endif
                    @can('eliminar empleado')         
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
             {{$empleados->links()}}
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
              url: "/empleados/"+delete_id,
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