@extends('themes.layaoutT')

@section('cont')
<div class="row ">
    <div class="col-8 " style="margin:auto">
      <div class="card">
        <div class="card-header bg-blue">
         
          <h3 class="card-title">Citas de {{$usuario->nombres}}</h3>
   
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
                <th><a class="btn btn-success btn-sm float-right" href="{{url('/pacient/' . $usuario->id . '/schedule/')}}" >Asignar cita </a></th>

                
              </tr>
            </thead>
            <tbody>  
              @forelse ($appointments as $appointment)
                  <tr>
                    <td>{{$appointment->id}}</td>
                    <td>{{$appointment->doctor()->nombres}}</td>
                    <td>{{$appointment->dates->format('d/m/Y H:i')}}</td>
                    <td>{{$appointment->status}}</td>
                    <td><a class="btn btn-info btn-sm " href="{{url('/pacient/' . $usuario->id . '/appointments/'. $appointment->id. '/edit/')}}" ><i class="fas fa-pencil-alt"></a></td>
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