@extends('themes/layaoutT')

@section('style')
<link rel="stylesheet" href="{{asset("plugins/select2/css/select2.min.css")}}">

@endsection

@section('cont')
<div class="col-md-9" style="margin:auto" >
  <div class="card card-primary " >
    <div class="card-header">
    <h3 class="card-title">Editar Usuario {{$usuario->nombres}}</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
  <form role="form" action="{{route('usuarios.update', $usuario->id)}}" method="POST">
    @method('PUT')
    @csrf
      <div class="card-body">
        <div class="form">
          <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
                <label for="fk_tipoDeidentificacion">{{ __('Tipo De Identificación:')}}</label>
                              <select class="form-control @error('fk_tipoDeidentificacion') is-invalid @enderror" id="fk_tipoDeidentificacion" name="fk_tipoDeidentificacion" value="{{ old('fk_tipoDeidentificacion') }}" autocomplete="fk_tipoDeidentificacion" autofocus>
                              @foreach ($tipoIdentificacion as $tipoidenti)
                              <option value="{{$tipoidenti['tipoDeIden_ID']}}">{{$tipoidenti['tipo']}}</option>
                              @endforeach
                              </select>
                              @error('fk_tipoDeidentificacion')
                                  <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                             @enderror
              </div>
            </div>
            <div class="col-sm-2">
              <!-- text input -->
              <div class="form-group">
                <label for="identificacion" >Identificacion:</label>
                <input id="identificacion" type="text" maxlength="10"  class="form-control @error('identificacion') is-invalid @enderror" name="identificacion" value="{{ old('identificacion') }}"  autocomplete="identificacion" autofocus>
                @error('identificacion')
                 <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
              
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="nombres" >Nombres:</label>
                <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{ old('nombres') }}"  autocomplete="nombres" autofocus >
                @error('nombres')
                 <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input id="nombres" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}"  autocomplete="apellidos" autofocus >
                @error('apellidos')
                <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                </span>
             @enderror
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>RH:</label>
                <select class="form-control @error('fk_rH') is-invalid @enderror" id="fk_rH" name="fk_rH" value="{{ old('fk_rH') }}" autocomplete="fk_rH" autofocus>
                  @foreach ($rh as $r)
                              <option value="{{$r['r_id']}}">{{$r['r']}}</option>
                  @endforeach
                </select>
                @error('fk_rH')
                <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                </span>
             @enderror
              </div>
            </div>
  
            <div class="col-sm-2">
              <div class="form-group">
                <label for="genero">Genero:</label>
                <select class="form-control @error('genero') is-invalid @enderror" id="genero" name="genero" value="{{ old('genero') }}">
                  <option  value="Masculino"  >Masculino</option>
                  <option  value="Femenino" >Femenino</option>
              </select>
              @error('genero')
              <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>
            </div>
  
            <div class="col-sm-2">
              <div class="form-group">
                <label for="fk_estadoCivil">Estado civil:</label>
                <select class="form-control @error('fk_estadoCivil') is-invalid @enderror" id="fk_estadoCivil" name="fk_estadoCivil" value="{{ old('fk_estadoCivil') }}">
                  <option  value="Soltero(a)'"  >Soltero(a)'</option>
                  <option  value="Casado(a)" >Casado(a)</option>
                  <option  value="Viudo(a)" >Viudo(a)</option>
                  <option  value="Divorciado(a)" >Divorciado(a)</option>
                  <option  value="Separado(a)" >Separado(a)</option>
                  <option  value="Comprometido(a)" >Comprometido(a)</option>
                  <option  value="Union libre" >Union libre</option>
              </select>
              @error('fk_estadoCivil')
              <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="fechaDeNacimiento">Fecha de nacimiento:</label>
                <input type="date" name="fechaDeNacimiento" class="form-control @error('fechaDeNacimiento') is-invalid @enderror" value="{{ old('fechaDeNacimiento') }}"   autocomplete="fecha de nacimiento"  >
                @error('fechaDeNacimiento')
                      <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                      </span>
               @enderror
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Telefono:</label>
                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}"  autocomplete="telefono" autofocus >
                @error('telefono')
                      <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                      </span>
               @enderror
              </div>
            </div>
  
            <div class="col-sm-2">
              <div class="form-group">
                <label>Celular:</label>
                <input type="text" class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular') }}"   autocomplete="celular"  >
                @error('celular')
                      <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                      </span>
                @enderror
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label  for="email">Email:</label>
                <input id="email" type="email" placeholder="Ej: name@hotmail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" >
                @error('email')
                      <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                      </span>
               @enderror
              </div>
            </div>
  
            <div class="col-sm-2">
              <div class="form-group">
                <label for="password">Contraseña:</label>
                <input input id="password" maxlength="8" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" >
                @error('password')
                <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                </span>
               @enderror
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Ocupacion:</label>
                <input id="ocupacion" type="text" class="form-control @error('ocupacion') is-invalid @enderror" name="ocupacion" value="{{ old('ocupacion') }}" autocomplete="ocupacion" autofocus >
                @error('ocupacion')
                <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                </span>
               @enderror
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Direccion:</label>
                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" autocomplete="direccion" autofocus >
                @error('direccion')
                      <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                      </span>
               @enderror
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="zona">Zona:</label>
                <select class="form-control @error('zona') is-invalid @enderror" id="zona" name="zona" value="{{ old('zona') }}">
                  <option  value="Rural"  >Rural</option>
                  <option  value="Urbana" >Urbana</option>
                
              </select>
              @error('zona')
              <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="fk_departamento">{{ __('Departamento:')}}</label>
                            <select class="form-control" id="fk_departamento" name="fk_departamento" value="{{ old('fk_departamento') }}" required autocomplete="fk_departamento" autofocus data-dependent="municipio">
                            <option disabled selected>Selecciona el departamento</option>   
                            @foreach ($departamento as $dep)
                            <option value="{{$dep['id']}}">{{$dep['nombre']}}</option>
                            @endforeach
                            </select>
                            
              
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Municipio:</label>
                <select class="form-control ">
                  <option>option 1</option>
                  <option>option 2</option>
                  <option>option 3</option>
                  <option>option 4</option>
                  <option>option 5</option>
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Nombre Responsable:</label>
                <input id="nombre_del_responsable" type="text" class="form-control @error('nombre_del_responsable') is-invalid @enderror" name="nombre_del_responsable" value="{{ old('nombre_del_responsable') }}" autocomplete="nombre_del_responsable" autofocus >
                @error('nombre_del_responsable')
                <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Telefono:</label>
                <input id="telefono_r" type="text" class="form-control @error('telefono_r') is-invalid @enderror" name="telefono_r" value="{{ old('telefono_r') }}" autocomplete="telefono_r" autofocus >
                @error('telefono_r')
                <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                </span>
               @enderror
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="fk_parentezco">Parentezco:</label>
                <select class="form-control @error('fk_parentezco') is-invalid @enderror" id="fk_parentezco" name="fk_parentezco" value="{{ old('fk_parentezco') }}">
                  <option  value="Hijo(a)"  >Hijo(a)</option>
                  <option  value="Suegro(a)" >Suegro(a)</option>
                  <option  value="Padre" >Padre</option>
                  <option  value="Madre" >Madre</option>
                  <option  value="Abuelo(a)" >Abuelo(a)</option>
                  <option  value="Esposo(a)" >Esposo(a)</option>
                  <option  value="Sobrino(a)" >Sobrino(a)</option>
                  <option  value="Tio(a)" >Tio(a)</option>
                  <option  value="Hermano(a)" >Hermano(a)</option>
                  <option  value="Primo(a)" >Primo(a)</option>
                  <option  value="Yerno(a)" >Yerno(a)</option>
                  <option  value="Cuñado(a)" >Cuñado(a)</option>
              </select>
              @error('fk_parentezco')
              <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
              </span>
            @enderror
              </div>
            </div>
  
            <div class="col-sm-2">
              <div class="form-group">
                <label>Religion:</label>
                <select class="form-control @error('fk_religion') is-invalid @enderror" id="fk_religion" name="fk_religion" value="{{ old('fk_religion') }}" autocomplete="fk_religion" autofocus>
                  @foreach ($religion as $reli)
                              <option value="{{$reli['re_id']}}">{{$reli['religion']}}</option>
                  @endforeach
                </select>
                @error('fk_rH')
                <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                </span>
             @enderror
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Discapacidad:</label>
                <select class="form-control @error('fk_discapacidad') is-invalid @enderror" id="fk_discapacidad" name="fk_discapacidad" value="{{ old('fk_discapacidad') }}" autocomplete="fk_religion" autofocus>
                  @foreach ($discapacidad as $discapacida)
                              <option value="{{$discapacida['dis_id']}}">{{$discapacida['discapacidad']}}</option>
                  @endforeach
                </select>
                @error('fk_discapacidad')
                <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                </span>
             @enderror
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Nivel Educativo:</label>
                <select class="form-control @error('fk_nivelEducativo') is-invalid @enderror" id="fk_nivelEducativo" name="fk_nivelEducativo" value="{{ old('fk_nivelEducativo') }}" autocomplete="fk_nivelEducativo" autofocus>
                  @foreach ($nivelEducativo as $nivelEducativ)
                              <option value="{{$nivelEducativ['nivel_id']}}">{{$nivelEducativ['nivel']}}</option>
                  @endforeach
                </select>
                @error('fk_nivelEducativo')
                <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                </span>
             @enderror
              </div>
            </div>
            
            <div class="col-sm-2">
              <div class="form-group">
                <label>Grupo etnico:</label>
                <select class="form-control @error('fk_grupoEtnico') is-invalid @enderror" id="fk_grupoEtnico" name="fk_grupoEtnico" value="{{ old('fk_grupoEtnico') }}" autocomplete="fk_grupoEtnico" autofocus>
                  @foreach ($grupoEtnico as $grupoEtnic)
                              <option value="{{$grupoEtnic['grupo_id']}}">{{$grupoEtnic['grupo']}}</option>
                  @endforeach
                </select>
                @error('fk_grupoEtnico')
                <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                </span>
             @enderror
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Poblacion Riesgo:</label>
                <select class="form-control @error('fk_poblacionRiesgo') is-invalid @enderror" id="fk_poblacionRiesgo" name="fk_poblacionRiesgo" value="{{ old('fk_poblacionRiesgo') }}" autocomplete="fk_poblacionRiesgo" autofocus>
                  @foreach ($poblacionRiesgo as $poblacionRiesg)
                              <option value="{{$poblacionRiesg['pobla_id']}}">{{$poblacionRiesg['poblaRies']}}</option>
                  @endforeach
                </select>
                @error('fk_poblacionRiesgo')
                <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                </span>
             @enderror
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label>Tipo de aseguradora:</label>
                <select class="form-control @error('fk_tipoAseguradora') is-invalid @enderror" id="fk_tipoAseguradora" name="fk_tipoAseguradora" value="{{ old('fk_tipoAseguradora') }}" autocomplete="fk_tipoAseguradora" autofocus>
                  @foreach ($tipoAseguradora  as $tipoAsegurador )
                              <option value="{{$tipoAsegurador['tip_id']}}">{{$tipoAsegurador['tipoAsegu']}}</option>
                  @endforeach
                </select>
                @error('fk_tipoAseguradora')
                <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                </span>
             @enderror
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label>Aseguradora:</label>
                <select class="form-control @error('fk_aseguradora') is-invalid @enderror" id="fk_aseguradora" name="fk_aseguradora" value="{{ old('fk_aseguradora') }}" autocomplete="fk_aseguradora" autofocus>
                  @foreach ($aseguradora as $asegurador)
                              <option value="{{$asegurador['grupo_id']}}">{{$asegurador['grupo']}}</option>
                  @endforeach
                </select>
                @error('fk_aseguradora')
                <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                </span>
             @enderror
              </div>
            </div>
          </div>
      </div>
      <!-- /.card-body -->
     
      <div class="card-footer">
      <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
     
    </form>
  </div>
</div>


@endsection

