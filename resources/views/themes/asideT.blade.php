<div class="sidebar-sticky pt-3">
  <ul class="nav flex-column">
    @hasanyrole('Doctor|super-admin|Administrador|Admisionista')
          <select name="role" id="role" style="margin: 10px;">
           @foreach (Auth::user()->getRoleNames() as $item)
          <option  >{{$item}}</option>
           @endforeach
          </select>
           @endhasanyrole
          
    <li class="nav-item  active">
      <a class="nav-link cool" href="{{route('home')}}" style="background-color: rgba(0, 135, 238, 0.885">
        <i class="fas fa-home"></i>
        Home <span class="sr-only">(current)</span>
      </a>
    </li>
    
    @role('User')
    <li class="nav-item">
       <a href="{{route('schedule')}}" class="nav-link cool ">
       <i class=" fas fa-book"></i>
         Agendar Cita
       </a>
     </li>

     <li class="nav-item">
          <a href="{{route('appointments')}}" class="nav-link cool">
            <i class="fas fa-calendar"></i>
              Mis Citas
         </a>
      </li>
    @endrole
   
    @role('Doctor')
          <li class="nav-item">
          <a href="{{route('pacient.appointments.doctor.show', Auth::user()->id)}}" class="nav-link cool ">
            <i class=" fas fa-calendar-week"></i>
               Mis Citas
           </a>
         </li>
     @endrole
    
    @can('listar especialidades')
     <li class="nav-item">
     <a href="{{route('specialities.index')}}" class="nav-link cool">
      <i class=" fas fa-briefcase"></i>
          Especialidades
      </a>
    </li>
    @endcan  
  
    
       
    @can('listar empleados')
    <li class="nav-item">
    <a href="{{route('empleados.index')}}" class="nav-link cool ">
     <i class=" fas fa-user-tie"></i>
         Empleados
     </a>
     </li>  
     @endcan
    
     

     @can('listar usuario')
     <li class="nav-item">
      <a href="{{url('usuarios')}}" class="nav-link cool">
        <i class="fas fa-users"></i>
          Usuarios
      </a>
    </li>
   @endcan
  
   
   @can('asignar horario doctor')
   <li class="nav-item">
   <a href="{{route('doctor.gestionar_horario')}}" class="nav-link cool">
     <i class=" fas fa-clock"></i>
        Gestionar Horario
    </a>
  </li>
 @endcan


    <li class="nav-item">
      <a href="{{route('password_update_view')}}" class="nav-link cool ">
        <i class=" fas fa-key"></i>
           Cambiar Contraseña
       
       </a>
    </li>
  </ul>

  
</div>


