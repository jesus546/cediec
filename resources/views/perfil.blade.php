@extends('themes/layaoutT')



@section('cont')
<div class="row">
      <div class="col-md-8" style="margin: auto">
        <div class="card">
            <div class="card-widget widget-user" >
                <div class="widget-user-header " style="background-color: rgba(45, 42, 241, 0.746)">
                    
                  </div>
                <div class="widget-user-image">
                      <img class="profile-user-img img-circle elevation-2" src="{{asset('img/user.png')}}" alt="Foto de perfil">
                </div>   
            </div>
         <br>
         <br>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" >
                <!-- Post -->
                <div class="post">
                  <div class="row " style="font-size:120%">
                    <div class="col-sm-6 " >
                      <address>
                        <strong>Tipo De Documento</strong><br>
                        <strong>Identificación:</strong><br>
                        <strong>Nombres:</strong><br>
                        <strong>Apellidos:</strong><br>
                        <strong>Celular:</strong><br>
                        <strong>Email:</strong><br>
                        <strong>Departamento:</strong><br>
                        <strong>Municipio:</strong><br>
                        <strong>Dirección:</strong><br>
                        <strong>Fecha de nacimiento:</strong><br>
                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6 ">
                      <address>
                        @if (isset(Auth::user()->type_identificacion_id()->tipo )) {{ Auth::user()->type_identificacion_id()->tipo}}
                        @else Indefinido @endif<br>
                        @if (isset(Auth::user()->identificacion )) {{ Auth::user()->identificacion }}
                        @else Indefinido @endif<br>
                        @if (isset(Auth::user()->nombres )) {{ ucwords(Auth::user()->nombres) }}
                        @else Indefinido @endif<br>
                        @if (isset(Auth::user()->apellidos )) {{ ucwords(Auth::user()->apellidos) }}
                        @else Indefinido @endif<br>
                        @if (isset(Auth::user()->celular )) {{ Auth::user()->celular }}
                        @else Indefinido @endif<br>
                        @if (isset( Auth::user()->email)) {{ Auth::user()->email }}
                        @else Indefinido @endif<br>
                        @if (isset(Auth::user()->departamento_id()->nombre )) {{Auth::user()->departamento_id()->nombre}} 
                        @else Indefinido @endif <br>
                        @if (isset(Auth::user()->municipio_id()->nombre )) {{Auth::user()->municipio_id()->nombre}} 
                        @else Indefinido @endif <br>
                        @if (isset(Auth::user()->direccion )) {{ ucwords(Auth::user()->direccion) }} 
                        @else Indefinido @endif<br>

                        @if (isset(Auth::user()->fechaDeNacimiento)) {{ Auth::user()->fechaDeNacimiento->format('Y/m/d')}}
                        @else Indefinido @endif<br>
                        
                      </address>
                    </div>
                    
              
                </div>
                <div class="card-widget " style=" color:rgba(20, 155, 155, 0.924)">
                      
                  <h5><i class="icon fas fa-info"></i> Sugerencia!</h5>
                  Para editar sus datos personales se puede comunicar con nosotros.
                </div>
              </div>
              </div>
        

            </div>
          </div><!-- /.card-body -->
        </div>
      </div>    
</div>

@endsection