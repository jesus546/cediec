@extends('themes.layaoutT')
@section('cont')
<div class="row ">
    <div class="col-8 " style="margin:auto">
      <div class="card">
        <div class="card-header bg-blue">
         
          <h3 class="card-title">Citas</h3>
   
        </div>
     
        <!-- /.card-header -->
        <div class="card-body table-responsive  p-0">
          <table class="table table-hover  text-nowrap">
            <thead >
              <tr>
                <th>Id</th>
                <th>Especialista</th>
                <th>Fecha</th>
                <th>Estado</th>
                
              </tr>
            </thead>
            <tbody>  
               @forelse ($appointments as $appointment)
                   <tr>
                     <td>{{$appointment->id}}</td>
                     <td>{{$appointment->doctor()->nombres}}</td>
                     <td>{{$appointment->dates->format('d/m/Y H:i')}}</td>
                     <td>{{$appointment->status}}</td>
                   </tr>
               @empty
                   <tr>
                     <td colspan="5">No hay citas registradas</td>
                   </tr>
               @endforelse
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection