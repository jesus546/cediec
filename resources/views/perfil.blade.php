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
          <div class="card-header p-2 mt-5">
            <ul class="nav nav-pills " style="font-size:100%" >
              <li class="nav-item"><a class="nav-link active" href="#informacion" data-toggle="tab" >Información</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Cambiar Contraseña</a></li>
            
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active" id="informacion">
                <!-- Post -->
                <div class="post">
                  <div class="row invoice-info" style="font-size:120%">
                    <div class="col-sm-6 invoice-col" >
                      <address>
                        <strong>Identificación:</strong><br>
                        <strong>Nombres:</strong><br>
                        <strong>Apellidos:</strong><br>
                        <strong>Celular:</strong><br>
                        <strong>Email:</strong><br>
                        <strong>Dirección:</strong><br>
                        <strong>Fecha de nacimiento:</strong><br>
                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6 invoice-col">
                      <address>
                        @if (isset(Auth::user()->identificacion )) {{ Auth::user()->identificacion }}<br>
                        @else Indefinido<br> @endif
                        @if (isset(Auth::user()->nombres )) {{ ucwords(Auth::user()->nombres) }}<br>
                        @else Indefinido<br> @endif
                        @if (isset(Auth::user()->apellidos )) {{ ucwords(Auth::user()->apellidos) }}<br>
                        @else Indefinido<br> @endif
                        @if (isset(Auth::user()->celular )) {{ Auth::user()->celular }}<br>
                        @else Indefinido<br> @endif
                        @if (isset( Auth::user()->email)) {{ Auth::user()->email }}<br>
                        @else Indefinido<br> @endif
                        
                        @if (isset(Auth::user()->direccion )) {{ ucwords(Auth::user()->direccion) }} <br>
                        @else  Indefinido<br> @endif

                        @if (isset(Auth::user()->fechaDeNacimiento)) {{ Auth::user()->fechaDeNacimiento->format('Y/m/d')}}
                        @else Indefinido @endif
                        
                      </address>
                    </div>
                    
              
                </div>
                <div class="card-widget " style=" color:rgba(20, 155, 155, 0.924)">
                      
                  <h5><i class="icon fas fa-info"></i> Sugerencia!</h5>
                  Para editar sus datos personales se puede comunicar con nosotros.
                </div>
              </div>
              </div>
        

              <div class="tab-pane" id="settings">
                <div class="post">
            
                <form  method="POST" action="{{route('password_update')}}">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                        <label for="old_password">Contraseña Actual</label>
                        <input type="password" id="old_password " maxlength="10" class="form-control col-md-4 @error('old_password') is-invalid @enderror" name="old_password" aria-describedby="passwordHelpInline">
                        @error('old_password')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                       </span>
                      @enderror
                      </div>
                      <div class="form-group">
                        <label for="password">Nueva Contraseña</label>
                        <input type="password" id="password" maxlength="10" class="form-control col-md-4 @error('password') is-invalid @enderror" name="password" aria-describedby="passwordHelpInline">
                        <small id="passwordHelpInline" class="text-muted">
                          maximo entre 8 y 10 caracteres.
                        </small>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                       </span>
                      @enderror
                      </div>
                      <div class="form-group">
                        <label for="password-confirm">Confirmar Contraseña</label>
                        <input type="password" id="password-confirm" maxlength="10" class="form-control col-md-4" name="password_confirmation" aria-describedby="passwordHelpInline">
                        <small id="passwordHelpInline" class="text-muted">
                          maximo entre 8 y 10 caracteres.
                        </small>
                      </div>
                      <button type="submit" class="btn btn-primary float-right">Actualizar</button>
                    </form>
              
                </div>
              </div>
      
            </div>
          </div><!-- /.card-body -->
        </div>
      </div>    
</div>

@endsection