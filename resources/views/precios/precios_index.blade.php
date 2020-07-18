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
                <th>id</th>
                <th>precio</th>
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
                <td scope="row">{{$price->id}}</td>
                  <td>{{$price->precio}}</td>
                  <td>
                    @role('super-admin')
                  <a class="btn btn-info btn-sm" href="{{route('price.edit', $price)}}" ><i class="fas fa-pencil-alt"></i> </a>
                  <a class="btn btn-info btn-sm" href="{{route('asignar_asegu_price', $price)}}" ><i class="fab fa-accusoft"></i> </a>
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