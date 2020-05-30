    <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
      <img src="{{asset('img/logo3.png')}}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">CEDIEC</span>
      </a>
  
      <!-- Sidebar -->
     
      <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 582px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('img/user.png')}}" class="img-circle elevation-2" alt="">
          </div>
          <div class="info">
          <a href="{{url('perfil')}}" class="d-block">{{ Auth::user()->nombres }}</a>
          </div>
        </div>
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          
          <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                 <li class="nav-item">
                  <a href="{{url('schedule')}}" class="nav-link ">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                      Agendar Cita
                    </p>
                  </a>
                </li>
                
          </ul>

          <ul class="nav nav-pills nav-sidebar flex-column  " data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                 <li class="nav-item">
                 <a href="{{route('appointments')}}" class="nav-link ">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>
                      Mis Citas
                    </p>
                  </a>
                </li>
                
          </ul>
          
    
          <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
                 <li class="nav-item">
                  <a href="{{url('usuarios')}}" class="nav-link ">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      Usuarios
                    </p>
                  </a>
                </li>
                
          </ul>
          
          <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
             <a href="{{route('roles.index')}}" class="nav-link ">
              <i class="nav-icon fas fa-user-tie"></i>
              
               <p>
                 Roles
               </p>
             </a>
           </li>
           
          </ul>
          <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
             <a href="{{route('permissions.index')}}" class="nav-link ">
              <i class="nav-icon fas fa-scroll"></i>
               <p>
                 Permisos
               </p>
             </a>
           </li>
           
          </ul>
    
    
         <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
               <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                 <i class="nav-icon fas fa-power-off"></i>
                 <p>
                   Salir
                 </p>
                </a>
              </li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>

        </nav>

      </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-auto-hidden os-scrollbar-unusable"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 46.3434%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
