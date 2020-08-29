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
                            <select class="form-control  @error('fk_tipoDeidentificacion') is-invalid @enderror" id="fk_tipoDeidentificacion" name="fk_tipoDeidentificacion" value="{{ old('fk_tipoDeidentificacion') }}"  autocomplete="Tipo De Identificación" autofocus>
                            <option disabled selected>Seleccionar</option>
                                @foreach ($tipoIdentificacion as $tipoidenti)
                            <option value="{{$tipoidenti['id']}}">{{$tipoidenti['tipo']}}</option>
                            @endforeach
                            </select>
                            @error('fk_tipoDeidentificacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                             @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="identificacion" >{{ __('Identificación:') }}</label>

                                <input id="identificacion" type="text" maxlength="10"  class="form-control @error('identificacion') is-invalid @enderror" name="identificacion" value="{{ old('identificacion') }}"  autocomplete="Identificación" autofocus>

                                @error('identificacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="nombres" >{{ __('Nombres:') }}</label>

                                <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{ old('nombres') }}" autocomplete="nombres" autofocus>

                                @error('nombres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                
                        </div>

                        <div class="form-group col-md-3">
                            <label for="apellidos" >{{ __('Apellidos:') }}</label>

                                <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" autocomplete="apellidos" autofocus>

                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                
                        </div>
                         
                        <div class="form-group col-md-2">
                            <label for="genero">{{ __('Generos:')}}</label>
                            <select class="form-control  @error('genero') is-invalid @enderror " id="genero" name="genero" value="{{ old('genero') }}">
                                <option disabled selected>Seleccionar</option>
                                <option  value="Masculino"  >Masculino</option>
                                <option  value="Femenino" >Femenino</option>
                              
                            </select>
                            @error('genero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="direccion" >{{ __('Direccion:') }}</label>
                            <input type="text" maxlength="20" id="direccion" class="form-control  @error('direccion') is-invalid @enderror"  placeholder="Ej:Ca 80 #5-16" name="direccion" value="{{ old('direccion') }}" autocomplete="direccion" autofocus>
                            @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fk_departamento">{{ __('Departamento:')}}</label>
                            <select class="form-control  @error('fk_departamento') is-invalid @enderror " id="fk_departamento" name="fk_departamento" value="{{ old('fk_departamento') }}"  autocomplete="departamento" autofocus >
                            <option disabled selected>Selecciona el departamento</option>   
                            @foreach ($departamento as $dep)
                            <option value="{{$dep['id']}}">{{$dep['nombre']}}</option>
                            @endforeach
                            </select>
                            @error('fk_departamento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fk_municipio">{{ __('Municipio:')}}</label>
                            <select class="form-control  @error('fk_municipio') is-invalid @enderror" id="fk_municipio" name="fk_municipio" value="{{ old('fk_municipio') }}"  autocomplete="municipio" autofocus>
                                <option >Selecciona primero el departamento</option>
                            </select>
                            @error('fk_municipio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-2">
                            <label for="zona">{{ __('Zona:')}}</label>
                            <select class="form-control  @error('zona') is-invalid @enderror" id="zona" name="zona" value="{{ old('zona') }}">
                                <option disabled selected>Seleccionar</option>
                                <option  value="Rural"  >Rural</option>
                                <option  value="Urbana" >Urbana</option>
                              
                            </select>
                            @error('zona')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="celular" >{{ __('Celular:') }}</label>
                            <input type="text" maxlength="10" id="celular" class="form-control @error('celular') is-invalid @enderror"  name="celular" value="{{ old('celular') }}" autocomplete="celular" autofocus>
                            @error('celular')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                
                        </div>

                        <div class="form-group col-md-3">
                            <label for="fechaDeNacimiento" >{{ __('Fecha De Nacimiento:') }}</label>
                            <input type="date" id="fechaDeNacimiento" class="form-control @error('fechaDeNacimiento') is-invalid @enderror "  name="fechaDeNacimiento" value="{{ old('fechaDeNacimiento') }}"  autocomplete="fecha de nacimiento" autofocus>
                            @error('fechaDeNacimiento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="email" >{{ __('Correo Electrónico:') }}</label>
                                <input id="email" type="email" placeholder="Ej: name@hotmail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
                        </div>

                        <div class="form-group col-md-2">
                            <label for="password">{{ __('Contraseña:') }}</label>
                                <input id="password" maxlength="10" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="password-confirm" >{{ __('Confirmar Contraseña:') }}</label>
                            <input id="password-confirm" maxlength="10" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            
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
