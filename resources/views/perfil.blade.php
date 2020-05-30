@extends('themes/layaoutT')

@section('cont')
<div class="row">
      <div class="col-md-10" style="margin: auto">
        <div class="card">
            <div class="card-widget widget-user">
                <div class="widget-user-header bg-info">
                    <h3 class="widget-user-username">{{ Auth::user()->nombres}}</h3>
                    </div>
                <div class="widget-user-image">
                      <img class="img-circle elevation-2" src="{{asset('img/user.png')}}" alt="Foto de perfil">
                </div>   
            </div>
          <div class="card-header p-2 mt-5">
            <ul class="nav nav-pills " >
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Información</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Editar Perfl</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Cambiar Contraseña</a></li>
            
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" id="activity">
                <!-- Post -->
                <div class="post">
                  
                </div>
              </div>
        

              <div class="tab-pane" id="settings">
                
              </div>
      
            </div>
          </div><!-- /.card-body -->
        </div>
      </div>    
</div>

@endsection