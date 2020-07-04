@extends('layout.layaout')
@section('style')
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
@endsection

@section('cont')
<div class="register-page ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header bg-blue">Se Miembro</div>
                
                <div class="card-body ">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-row ">
                        <div class="form-group col-md-3">
                            <label for="fk_tipoDeidentificacion">{{ __('Tipo De Identificación:')}}</label>
                            <select class="form-control" id="fk_tipoDeidentificacion" name="fk_tipoDeidentificacion" value="{{ old('fk_tipoDeidentificacion') }}" required autocomplete="fk_tipoDeidentificacion" autofocus>
                            @foreach ($tipoIdentificacion as $tipoidenti)
                            <option value="{{$tipoidenti['tipoDeIden_ID']}}">{{$tipoidenti['tipo']}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="identificacion" >{{ __('Identificación:') }}</label>

                                <input id="identificacion" type="text" maxlength="10"  class="form-control @error('identificacion') is-invalid @enderror" name="identificacion" value="{{ old('identificacion') }}" required autocomplete="identificacion" autofocus>

                                @error('identificacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="nombres" >{{ __('Nombres:') }}</label>

                                <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{ old('nombres') }}" required autocomplete="nombres" autofocus>

                                @error('nombres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                
                        </div>

                        <div class="form-group col-md-3">
                            <label for="apellidos" >{{ __('Apellidos:') }}</label>

                                <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>

                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                
                        </div>
                         
                        <div class="form-group col-md-2">
                            <label for="genero">{{ __('Generos:')}}</label>
                            <select class="form-control" id="genero" name="genero" value="{{ old('genero') }}">
                                <option  value="Masculino"  >Masculino</option>
                                <option  value="Femenino" >Femenino</option>
                              
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="direccion" >{{ __('Direccion:') }}</label>
                            <input type="text" maxlength="20" id="direccion" class="form-control"  placeholder="Ej:Ca 80 #5-16" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fk_departamento">{{ __('Departamento:')}}</label>
                            <select class="form-control" id="departamento" name="fk_departamento" value="{{ old('fk_departamento') }}" required autocomplete="fk_departamento" autofocus data-dependent="municipio">
                            <option disabled selected>Selecciona el departamento</option>   
                            @foreach ($departamento as $dep)
                            <option value="{{$dep['id']}}">{{$dep['nombre']}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fk_municipio">{{ __('Municipio:')}}</label>
                            <select class="form-control" id="municipio" name="fk_municipio" value="{{ old('fk_municipio') }}" required autocomplete="fk_municipio" autofocus>
                                <option >Selecciona primero el departamento</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="zona">{{ __('Zona:')}}</label>
                            <select class="form-control" id="zona" name="zona" value="{{ old('zona') }}">
                                <option  value="Rural"  >Rural</option>
                                <option  value="Urbana" >Urbana</option>
                              
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="celular" >{{ __('Celular:') }}</label>
                            <input type="text" maxlength="10" id="celular" class="form-control"  name="celular" value="{{ old('celular') }}" required autocomplete="celular" autofocus>
                              
                
                        </div>

                        <div class="form-group col-md-3">
                            <label for="fechaDeNacimiento" >{{ __('Fecha De Nacimiento:') }}</label>
                            <input type="date" id="fechaDeNacimiento" class="form-control "  name="fechaDeNacimiento" value="{{ old('fechaDeNacimiento') }}" required autocomplete="fecha de nacimiento" autofocus>
                             
                        </div>

                        <div class="form-group col-md-3">
                            <label for="email" >{{ __('Correo Electrónico:') }}</label>
                                <input id="email" type="email" placeholder="Ej: name@hotmail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
                        </div>

                        <div class="form-group col-md-2">
                            <label for="password">{{ __('Contraseña:') }}</label>
                                <input id="password" maxlength="8" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="password-confirm" >{{ __('Confirmar Contraseña:') }}</label>
                            <input id="password-confirm" maxlength="8" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            
                        </div>
 
                    </div>
                </div>
                    <div class="card-footer">
                        <div class="form-group mb-0 ">
                            <div class="col-md-6 input-group-prepend">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
   @include('themes.includes.user.municipio.ajax_municipio')
@endsection
