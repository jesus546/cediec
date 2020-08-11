@extends('themes.layaoutT')

@section('cont')
<div class="row ">
    <div class="col-md-6" style="margin:auto">
      <div class="card">
        <div class="card-header bg-blue">
         
          <h3 class="card-title">Precios</h3>
   
        </div>
     
        <!-- /.card-header -->
        <div class="card-body table-responsive  p-0">
          <table class="table table-hover  text-nowrap">
            <thead >
              <tr>
                <th>ID</th>
                <th>Precio</th>
                <th>
                  @role('super-admin')
                  <a href="{{route('price.create')}}" class="btn btn-success btn-sm float-right">Crear Precio</a>
                  @endrole
                  </th>
                
                
              </tr>
            </thead>
            <tbody>  
          @foreach ($price as $price)
          <tr>
            <input type="hidden" class="dele_price_value" value="{{$price->id}}">
                <td scope="row">{{$price->id}}</td>
                <td>{{$price->precio}}</td>
                <td>
                  @role('super-admin')
                <a class="btn btn-info btn-sm" href="{{route('price.edit', $price)}}" ><i class="fas fa-pencil-alt"></i> </a>
                <a class="btn btn-warning btn-sm" href="{{route('asignar_asegu_price', $price)}}" ><i class="fab fa-accusoft"></i> </a>
                <button class="btn btn-danger btn-sm delete_price" type="button" ><i class="fas fa-trash"></i></button>
                @endrole
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

       $('.delete_price').click(function(e){
         e.preventDefault();
         var delete_id = $(this).closest('tr').find('.dele_price_value').val();
        swal({
            title: "esta seguro?",
            text: "una vez eliminado, este precio no se puede recuperar",
            icon: "warning",
            buttons: true,
            dangerMode: true,
       })
       .then((willDelete) => {
       if (willDelete) {
        
           $.ajax({
              type:"DELETE",
              url: "/price/"+delete_id,
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