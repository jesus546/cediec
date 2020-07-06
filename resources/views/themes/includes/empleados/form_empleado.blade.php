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
      <input id="identificacion" type="text" maxlength="10"  class="form-control @error('identificacion') is-invalid @enderror" name="identificacion" @if (isset($empleado))
      value="{{$empleado->identificacion}}" @endif  autocomplete="identificacion" autofocus>
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
        <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" @if (isset($empleado))
        value="{{$empleado->nombres}}" @endif   autocomplete="nombres" autofocus >
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
        <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" @if (isset($empleado))
        value="{{$empleado->apellidos}}" @endif   autocomplete="apellidos" autofocus >
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
          <option  value="Masculino"@if (isset($empleados)) @if ($empleado->genero=='Masculino' ) selected @endif @endif>Masculino</option>
          <option  value="Femenino" @if (isset($empleados))@if ($empleado->genero=='Femenino' ) selected @endif @endif>Femenino</option>
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
          <option  value="Soltero(a)"@if (isset($empleados)) @if ($empleado->fk_estadoCivil=='Soltero(a)' ) selected @endif @endif >Soltero(a)</option>
          <option  value="Casado(a)"@if (isset($empleados)) @if ($empleado->fk_estadoCivil=='Casado(a)' ) selected @endif @endif>Casado(a)</option>
          <option  value="Viudo(a)" @if (isset($empleados))@if ($empleado->fk_estadoCivil=='Viudo(a)' ) selected @endif @endif>Viudo(a)</option>
          <option  value="Divorciado(a)" @if (isset($empleados))@if ($empleado->fk_estadoCivil=='Divorciado(a)' ) selected @endif @endif>Divorciado(a)</option>
          <option  value="Separado(a)"@if (isset($empleados)) @if ($empleado->fk_estadoCivil=='Separado(a)' ) selected @endif @endif>Separado(a)</option>
          <option  value="Comprometido(a)"@if (isset($empleados))@if ($empleado->fk_estadoCivil=='Comprometido(a)' ) selected @endif @endif>Comprometido(a)</option>
          <option  value="Union libre" @if (isset($empleados))@if ($empleado->fk_estadoCivil=='Union libre' ) selected @endif @endif>Union libre</option>
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
        <input type="date" name="fechaDeNacimiento" class="form-control @error('fechaDeNacimiento') is-invalid @enderror" @if (isset($empleado))
        value="{{$empleado->fechaDenacimiento}}" @endif    autocomplete="fecha de nacimiento"  >
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
        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" @if (isset($empleado))
        value="{{$empleado->telefono}}" @endif   autocomplete="telefono" autofocus >
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
        <input type="text" class="form-control" name="celular" @if (isset($empleado))
        value="{{$empleado->celular}}" @endif  autocomplete="celular"  >
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label  for="email">Email:</label>
        <input id="email" type="email" placeholder="Ej: name@hotmail.com" class="form-control @error('email') is-invalid @enderror" name="email" @if (isset($empleado))
        value="{{$empleado->email}}" @endif autocomplete="email" >
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
        <input input id="password" maxlength="10" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" >
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
        <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" @if (isset($empleados))
        value="{{$empleado->direccion}}" @endif  autocomplete="direccion" autofocus >
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
        <select class="form-control" id="zona" name="zona" value="{{ old('zona') }}">
          <option  value="Rural"  @if (isset($empleados))
          @if ($empleado->zona=='Rural' ) selected @endif
          @endif>Rural</option>
          <option  value="Urbana" 
          @if (isset($empleados))
          @if ($empleado->zona=='Urbana' ) selected @endif
          @endif>Urbana</option>
        
      </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="fk_departamento">{{ __('Departamento:')}}</label>
        <select class="form-control" id="fk_departamento" name="fk_departamento" value="{{ old('fk_departamento') }}" autocomplete="fk_departamento" autofocus data-dependent="municipio">
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
  </div>
  
  
  </div>