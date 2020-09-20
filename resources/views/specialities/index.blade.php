@extends('themes.layaoutT')

@section('cont')
<div class="row ">
    <div class="col-8 " style="margin:auto">
      <div class="card">
        <div class="card-header bg-info">
         
          <h3 class="card-title">Especialidades</h3>
   
        </div>
     
        <!-- /.card-header -->
        <div class="card-body table-responsive  p-0">
          <table class="table table-hover  text-nowrap">
            <thead >
              <tr>
                <th>Nombre</th>
                <th># De Medicos</th>
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
              <input type="hidden" class="dele_specialities_value" value="{{$specialities->id}}">
                <td scope="row">{{ucwords($specialities->name)}}</td>
                  <td>{{$specialities->users->count()}}</td>
                  <td>
                    @can('editar especialidad')
                     <a class="btn btn-info btn-sm" href="{{route('specialities.edit', $specialities )}}" ><i class="fas fa-pencil-alt"></i> </a>
                    @endcan

                    @can('eliminar especialidad')
                    <button class="btn btn-danger btn-sm delete_specialities" type="button" ><i class="fas fa-trash"></i></button>
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

@section('script')
    <script>
      $.ajaxSetup({
          headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

       $('.delete_specialities').click(function(e){
         e.preventDefault();
         var delete_id = $(this).closest('tr').find('.dele_specialities_value').val();
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
              url: "/specialities/"+delete_id,
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