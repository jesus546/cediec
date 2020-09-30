
<a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3 " href="{{route('home')}}">
   <img src="{{asset('img/logo.png')}}" alt="imagen cediec" width="150" height="30">
  </a>

<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<ul class="navbar-nav px-3 ">

  <li class="nav-item ">
    <a class="nav-link active" href="{{ route('perfil') }}" style="font-family: 'Open Sans', sans-serif;" >

      {{ ucwords(Auth::user()->nombres) }}
    </a>
</ul>


<ul class="navbar-nav px-3 ">

 
 
    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
       <i class="nav-icon fas fa-power-off"></i>
       Salir
    </a>
  </li>
</ul>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>





