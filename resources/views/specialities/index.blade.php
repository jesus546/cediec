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
                <th>Fecha</th>
                
                
              </tr>
            </thead>
            <tbody>  
            @foreach ($specialities as $specialities)
            <tr>
                <td scope="row">{{$specialities->name}}</td>
                  <td>0</td>
                  <td><a class="btn btn-info btn-sm" href="{{url('/specialities/' . $specialities->id . '/edit/')}}" ><i class="fas fa-pencil-alt"></i> </a></td>
    
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