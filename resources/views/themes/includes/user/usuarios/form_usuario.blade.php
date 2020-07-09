<div class="card-body">
        
    <div  class="form-row">
    <div class="col-md-4">
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
    <div class="col-md-4">
      <!-- text input -->
      <div class="form-group">
        <label for="identificacion" >Identificacion:</label>
      <input id="identificacion" type="text" maxlength="10"  class="form-control @error('identificacion') is-invalid @enderror" name="identificacion" @if (isset($usuario))
      value="{{$usuario->identificacion}}" @else value="{{ old('identificacion') }}"  @endif  autocomplete="identificacion" autofocus>
        @error('identificacion')
         <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
        </span>
         @enderror
      </div>
    </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="nombres" >Nombres:</label>
          <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" @if (isset($usuario))
           value="{{$usuario->nombres}}"@else value="{{ old('nombres') }}" @endif   autocomplete="nombres" autofocus >
                  @error('nombres')
                   <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
          </div>
      </div>
    
    </div>
       
    <div  class="form-row">
    <div class="col-md-3">
      <div class="form-group">
        <label for="apellidos">Apellidos:</label>
        <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" @if (isset($usuario))
        value="{{$usuario->apellidos}}"@else value="{{ old('apellidos') }}" @endif   autocomplete="apellidos" autofocus >
        @error('apellidos')
        <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
        </span>
     @enderror
      </div>
    </div>
 
    <div class="col-md-2">
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

    <div class="col-md-2">
      <div class="form-group">
        <label for="genero">Genero:</label>
        <select class="form-control @error('genero') is-invalid @enderror" id="genero" name="genero" value="{{ old('genero') }}">
          <option  value="Masculino"@if (isset($usuario)) @if ($usuario->genero=='Masculino' ) selected @endif @endif>Masculino</option>
          <option  value="Femenino" @if (isset($usuario))@if ($usuario->genero=='Femenino' ) selected @endif @endif>Femenino</option>
      </select>
      @error('genero')
      <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
      </span>
    @enderror
      </div>
    </div>
  
    <div class="col-md-2">
      <div class="form-group">
        <label for="fk_estadoCivil">Estado civil:</label>
        <select class="form-control @error('fk_estadoCivil') is-invalid @enderror" id="fk_estadoCivil" name="fk_estadoCivil" value="{{ old('fk_estadoCivil') }}">
          <option  value="Soltero(a)"@if (isset($usuario)) @if ($usuario->fk_estadoCivil=='Soltero(a)' ) selected @endif @endif >Soltero(a)</option>
          <option  value="Casado(a)"@if (isset($usuario)) @if ($usuario->fk_estadoCivil=='Casado(a)' ) selected @endif @endif>Casado(a)</option>
          <option  value="Viudo(a)" @if (isset($usuario))@if ($usuario->fk_estadoCivil=='Viudo(a)' ) selected @endif @endif>Viudo(a)</option>
          <option  value="Divorciado(a)" @if (isset($usuario))@if ($usuario->fk_estadoCivil=='Divorciado(a)' ) selected @endif @endif>Divorciado(a)</option>
          <option  value="Separado(a)"@if (isset($usuario)) @if ($usuario->fk_estadoCivil=='Separado(a)' ) selected @endif @endif>Separado(a)</option>
          <option  value="Comprometido(a)"@if (isset($usuario))@if ($usuario->fk_estadoCivil=='Comprometido(a)' ) selected @endif @endif>Comprometido(a)</option>
          <option  value="Union libre" @if (isset($usuario))@if ($usuario->fk_estadoCivil=='Union libre' ) selected @endif @endif>Union libre</option>
      </select>
      @error('fk_estadoCivil')
      <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
      </span>
       @enderror
      </div>
     </div>

     <div class="col-md-3">
      <div class="form-group">
        <label for="fechaDeNacimiento">Fecha de nacimiento:</label>
        <input type="date" name="fechaDeNacimiento" class="form-control @error('fechaDeNacimiento') is-invalid @enderror" @if (isset($usuario))
        value="{{$usuario->fechaDenacimiento}}" @else value="{{ old('fechaDeNacimiento') }}" @endif    autocomplete="fecha de nacimiento"  >
        @error('fechaDeNacimiento')
              <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
              </span>
       @enderror
      </div>
    </div>
   </div>


   <div  class="form-row">
    <div class="col-md-3">
      <div class="form-group">
        <label>Telefono:</label>
        <input id="telefono" type="text" maxlength="10" class="form-control @error('telefono') is-invalid @enderror" name="telefono" @if (isset($usuario))
        value="{{$usuario->telefono}}"@else value="{{ old('telefono') }}" @endif   autocomplete="telefono" autofocus >
        @error('telefono')
              <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
              </span>
       @enderror
      </div>
    </div>

    <div class="col-md-3">
      <div class="form-group">
        <label>Celular:</label>
        <input type="text" maxlength="10" class="form-control @error('celular') is-invalid @enderror" name="celular" @if (isset($usuario))
        value="{{$usuario->celular}}"@else value="{{ old('celular') }}" @endif  autocomplete="celular"  >
        @error('celular')
        <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
        </span>
         @enderror
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label  for="email">Email:</label>
        <input id="email" type="email" placeholder="Ej: name@hotmail.com" class="form-control @error('email') is-invalid @enderror" name="email" @if (isset($usuario))
        value="{{$usuario->email}}"@else value="{{ old('email') }}" @endif autocomplete="email" >
        @error('email')
              <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
              </span>
       @enderror
      </div>
    </div>

    <div class="col-md-2">
      <div class="form-group">
        <label for="password">Contraseña:</label>
        <input  id="password" maxlength="10" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" >
        @error('password')
        <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
        </span>
       @enderror
      </div>
    </div>
   </div>
   <div class="form-row">
    <div class="col-md-4">
      <div class="form-group">
        <label>Direccion:</label>
        <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" @if (isset($usuario))
        value="{{$usuario->direccion}}"@else value="{{ old('direccion') }}" @endif  autocomplete="direccion" autofocus >
        @error('direccion')
              <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
              </span>
       @enderror
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="zona">Zona:</label>
        <select class="form-control @error('zona') is-invalid @enderror" id="zona" name="zona" value="{{ old('zona') }}">
          <option  value="Rural"  @if (isset($usuario))
          @if ($usuario->zona=='Rural' ) selected @endif
          @endif>Rural</option>
          <option  value="Urbana" 
          @if (isset($usuario))
          @if ($usuario->zona=='Urbana' ) selected @endif
          @endif>Urbana</option>
        
      </select>

      @error('zona')
              <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
              </span>
       @enderror
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="fk_departamento">{{ __('Departamento:')}}</label>
        <select class="form-control @error('fk_departamento') is-invalid @enderror" id="fk_departamento" name="fk_departamento" value="{{ old('fk_departamento') }}" autocomplete="fk_departamento" autofocus data-dependent="municipio">
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
    </div>
    <div class="col-md-3">
      <label for="fk_municipio">{{ __('Municipio:')}}</label>
      <select class="form-control @error('fk_municipio') is-invalid @enderror" id="fk_municipio" name="fk_municipio" value="{{ old('fk_municipio') }}"  autocomplete="fk_municipio" autofocus>
          <option >Selecciona primero el departamento</option>
      </select>
      @error('fk_municipio')
    <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
    </span>
    @enderror
    </div>
  </div>

  <div class="form-row">
  <div class="col-md-4">
    <div class="form-group">
      <label>Nombres del responsable:</label>
      <input id="nombre_del_responsable" type="text" class="form-control @error('nombre_del_responsable') is-invalid @enderror"
      @if (isset($usuario)) value="{{$usuario->nombre_del_responsable}}" @else value="{{ old('nombre_del_responsable') }}" @endif 
      name="nombre_del_responsable"  autocomplete="nombre_del_responsable" autofocus >
      @error('nombre_del_responsable')
      <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group">
      <label>Telefono:</label>
      <input id="telefono_r" type="text" class="form-control @error('telefono_r') is-invalid @enderror" name="telefono_r" 
      @if (isset($usuario)) value="{{$usuario->telefono_r}}" @else value="{{ old('telefono_r') }}" @endif 
       autocomplete="telefono_r" autofocus >
      @error('telefono_r')
      <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
      </span>
     @enderror
    </div>
  </div>

  <div class="col-md-2">
    <div class="form-group">
      <label for="fk_parentezco">Parentezco:</label>
      <select class="form-control @error('fk_parentezco') is-invalid @enderror" id="fk_parentezco" name="fk_parentezco" value="{{ old('fk_parentezco') }}">
        <option  value="Hijo(a)" @if (isset($usuario)) @if ($usuario->fk_parentezco=='Hijo(a)' ) selected @endif @endif >Hijo(a)</option>
        <option  value="Suegro(a)" @if (isset($usuario)) @if ($usuario->fk_parentezco=='Suegro(a)' ) selected @endif @endif>Suegro(a)</option>
        <option  value="Padre" @if (isset($usuario)) @if ($usuario->fk_parentezco=='Padre' ) selected @endif @endif>Padre</option>
        <option  value="Madre" @if (isset($usuario)) @if ($usuario->fk_parentezco=='Madre' ) selected @endif @endif>Madre</option>
        <option  value="Abuelo(a)" @if (isset($usuario)) @if ($usuario->fk_parentezco=='Abuelo(a)' ) selected @endif @endif>Abuelo(a)</option>
        <option  value="Esposo(a)" @if (isset($usuario)) @if ($usuario->fk_parentezco=='Esposo(a)' ) selected @endif @endif>Esposo(a)</option>
        <option  value="Sobrino(a)" @if (isset($usuario)) @if ($usuario->fk_parentezco=='Sobrino(a)' ) selected @endif @endif>Sobrino(a)</option>
        <option  value="Tio(a)" @if (isset($usuario)) @if ($usuario->fk_parentezco=='Tio(a)' ) selected @endif @endif>Tio(a)</option>
        <option  value="Hermano(a)" @if (isset($usuario)) @if ($usuario->fk_parentezco=='Hermano(a)' ) selected @endif @endif>Hermano(a)</option>
        <option  value="Primo(a)" @if (isset($usuario)) @if ($usuario->fk_parentezco=='Primo(a)' ) selected @endif @endif>Primo(a)</option>
        <option  value="Yerno(a)" @if (isset($usuario)) @if ($usuario->fk_parentezco=='Yerno(a)' ) selected @endif @endif>Yerno(a)</option>
        <option  value="Cuñado(a)" @if (isset($usuario)) @if ($usuario->fk_parentezco=='Cuñado(a)' ) selected @endif @endif>Cuñado(a)</option>
    </select>
    @error('fk_parentezco')
    <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
    </span>
  @enderror
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group">
      <label>Religion:</label>
      <select class="form-control @error('fk_religion') is-invalid @enderror" id="fk_religion" name="fk_religion" value="{{ old('fk_religion') }}" autocomplete="fk_religion" autofocus>
        @foreach ($religion as $reli)
                    <option value="{{$reli['re_id']}}">{{$reli['religion']}}</option>
        @endforeach
      </select>
      @error('fk_religion')
      <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
      </span>
   @enderror
    </div>
  </div>
</div>
  
  
<div class="form-row">
    <div class="col-md-3">
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
     
      <div class="col-md-3">
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
      
      <div class="col-md-3">
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

      <div class="col-md-3">
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

</div>
  
  <div class="form-row">
     
  <div class="col-md-3">
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
  <div class="col-md-4">
    <div class="form-group">
      <label>Aseguradora:</label>
      <select class="form-control " id="fk_aseguradora" name="fk_aseguradora" value="{{ old('fk_aseguradora') }}" autocomplete="fk_aseguradora" autofocus>
        @foreach ($aseguradora as $asegurador)
                    <option value="{{$asegurador['ase_id']}}">{{$asegurador['asegu']}}</option>
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


  @section('script')
   @include('themes.includes.user.municipio.ajax_municipio')
@endsection
