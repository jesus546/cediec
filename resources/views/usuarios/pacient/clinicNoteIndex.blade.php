@extends('themes/layaoutT')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('pacient.files', $usuario)}}">Archivo</a></li>
<li class="breadcrumb-item active">Notas</li>
@endsection

@section('cont')
<div class="row ">
    <div class="col-10 " style="margin:auto">
      <div class="card">
        <div class="card-header ">
        <h3 class="card-title">Notas De Evolución {{ucwords($usuario->nombres)}}</h3>

            
        </div>
     
        <!-- /.card-header -->
        <div class="card-body table-responsive  p-0">
          <table class="table table-hover  text-nowrap">
            <thead >
              <tr>
                <th>Creado</th>
                <th>Nombres</th>
          
                <th>
                  @role('Doctor')
                  @can('crear nota de evolucion')
                  <a href="{{route('clinic_note.create', $usuario)}}" class="btn btn-success btn-sm float-right" >Crear Nota</a>
                  @endcan
                  @endrole
                </th>
                
              </tr>
            </thead>
            <tbody>
          
            @foreach ($clinic_notes as $note)
            <tr>
              <input type="hidden" class="dele_user_value" value="{{$note->id}}">
              <td scope="row">{{$note->created_at->format('Y/m/d g:i A')}}</td>
              <td>Nota de Evolucion</td>

              <td>
                @role('Doctor')
                @can('editar nota de evolucion')
                <a class="btn btn-info btn-sm" href="{{route('clinic_note.edit', [$usuario, $note])}}" ><i class="fas fa-pencil-alt"></i> </a>
                @endcan
                @endrole        
                <a class="btn btn-info btn-sm" href="{{route('pdf_historia', [$usuario, $note])}}" ><i class="fas fa-download"></i> </a>   
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