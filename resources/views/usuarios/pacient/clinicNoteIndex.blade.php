@extends('themes/layaoutT')

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
                <a href="{{route('clinic_note.create', $usuario)}}" class="btn btn-success btn-sm float-right" >Crear Nota</a>
                @can('registrar usuario')
                <a href="{{route('clinic_data.index', $usuario)}}" class="btn btn-success btn-sm float-right" style="margin-right: 3px;">Historia</a>
                
                @endcan
                
                </th>
                
              </tr>
            </thead>
            <tbody>
          
            @foreach ($clinic_notes as $note)
            <tr>
              <input type="hidden" class="dele_user_value" value="{{$note->id}}">
              <td scope="row">{{$note->created_at}}</td>
              <td>Nota de Evolucion</td>

              <td>
                
                <a class="btn btn-info btn-sm" href="{{route('clinic_note.edit', [$usuario, $note])}}" ><i class="fas fa-pencil-alt"></i> </a>
                           
              </td>
            </tr>
            @endforeach
          
              
              
            </tbody>
          </table>
        </div>
        
      </div>
    </div>
  </div>
 
  <div class="modal fade" id="modal-lg modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Large Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="modal_note_edit_form" action="" method="POST">
            @method('PUT')
            @csrf
          
          
              <div class="col-md-8">
                <div class="form-group">
                <label for="fk_parentezco">Parentezco:</label>
                 
                       <select id="modal_note_privacy" class="form-control form-control-sm  " name="privacy">
                        <option value="public">Pública</option>
                        <option value="private">Privada</option>
                      </select>
          
                  </div>
                </div>
          
            <div class="col-md-8">
              <div class="form-group">
                <label for="description"  ><h6><strong >Descripción:</strong></h6></label>
                <textarea id="modal_note_description" name="description" class="form-control" rows="3"></textarea>
              </div>

              </div>
          
            
            
         
        </div>
          
          
        </div>
        <div class="modal-footer justify-content-between">
          <button type="submit"  id="enviar" class="btn btn-info">Guardar</button>
        </form>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
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