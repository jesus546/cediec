<div class="card-body table-responsive  p-0">
    <table class="table table-hover  text-nowrap">
      <thead >
        <tr>
          <th>Id</th>
          <th>Especialista</th>
          <th>Fecha</th>
          <th>Estado</th>
          @hasanyrole('admisionista|super-admin')
          <th><a class="btn btn-success btn-sm float-right" href="{{url('/pacient/' . $usuario->id . '/schedule/')}}" >Asignar cita </a></th>
          @endhasanyrole
          

          
        </tr>
      </thead>
      <tbody>  
        @forelse ($appointments as $appointment)
            <tr>
              <td>{{$appointment->id}}</td>
              <td>{{$appointment->doctor()->nombres}}</td> 
              <td>{{$appointment->dates->format('d/m/Y h:i a')}}</td>
              <td>{{$appointment->status}}</td>
            @hasanyrole('admisionista|super-admin')
            <td><a class="btn btn-info btn-sm " href="{{url('/pacient/' . $usuario->id . '/appointments/'. $appointment->id. '/edit/')}}" ><i class="fas fa-pencil-alt"></a></td>
            @endhasanyrole
             
            </tr>
        @empty
            <tr>
              <td colspan="5">No hay citas registradas</td>
            </tr>
        @endforelse
     </tbody>
    </table>
  </div>