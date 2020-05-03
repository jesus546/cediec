@extends('layout.layaout')

@section('cont')
   <div class="hold-transition login-page">
     <div class="login-box ">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>
          
        <div class="card">
            <div class="card-body login-card-body">
              <p class="login-box-msg">Iniciar Sesion</p>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-group mb-3">
                               <input type="email" placeholder="Email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                               <div class="input-group-append">
                                <div class="input-group-text">
                                  <span class="fas fa-envelope"></span>
                                </div>
                              </div>                           
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                       </div>
                    
                        <div class="input-group mb-3">
                                <input id="password" type="password"placeholder="Password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                      <span class="fas fa-lock"></span>
                                    </div>
                                  </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                       </div>
                       <div class="row">
                       <div class="col-8">
                         <div class="icheck-primary">
                           <input type="checkbox" class="form-check-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                           <label  for="remember">
                            {{ __('Recuerdame') }}
                           </label>
                         </div>
                       </div>

                       <div class="col-4">
                        <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                         </button>
                         
                      </div>
                      <div>
                    </form>
                    <p class="mb-1">
                        @if (Route::has('password.request'))
                                    <a  href="{{ route('password.request') }}">
                                        {{ __('Olvidaste Tu Contraseña?') }}
                                    </a>
                         @endif
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('register') }}" class="text-center">Registrarse</a>
                    </p>
                 </div>
            </div>
        </div>
    </div>
  </div>
@endsection

