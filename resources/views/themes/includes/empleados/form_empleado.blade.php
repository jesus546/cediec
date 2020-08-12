<div class="card-body">
        
  <div  class="form-row">
    <div class="col-md-4">
      <div class="form-group">
        
        <label for="fk_tipoDeidentificacion">{{ __('Tipo De Identificación:')}}</label>
        <select class="form-control @error('fk_tipoDeidentificacion') is-invalid @enderror" id="fk_tipoDeidentificacion" name="fk_tipoDeidentificacion" value="{{ old('fk_tipoDeidentificacion') }}"  autofocus>
          <option disabled selected>
            @if(isset($empleado))
            @if (isset($empleado->type_identificacion_id()->tipo))

            {{$empleado->type_identificacion_id()->tipo}}
            @else
            Seleccione
            @endif
            @else
            Seleccione 
            @endif
            
        </option>
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
    </div>
    <div class="col-md-4">
      <!-- text input -->
      <div class="form-group">
        <label for="identificacion" >Identificacion:</label>
      <input id="identificacion" type="text" maxlength="10"  class="form-control @error('identificacion') is-invalid @enderror" name="identificacion" @if (isset($empleado))
      value="{{$empleado->identificacion}}" @else value="{{ old('identificacion') }}"  @endif   autofocus>
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
        <input id="nombres" type="text" maxlength="60" class="form-control @error('nombres') is-invalid @enderror" name="nombres" @if (isset($empleado))
         value="{{ucwords($empleado->nombres)}}"@else value="{{ old('nombres') }}" @endif    autofocus >
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
        <input id="apellidos" type="text" maxlength="60" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" @if (isset($empleado))
        value="{{ucwords($empleado->apellidos)}}"@else value="{{ old('apellidos') }}" @endif    autofocus >
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
        <select class="form-control @error('fk_rH') is-invalid @enderror" id="fk_rH" name="fk_rH" value="{{ old('fk_rH') }}"  autofocus>
          <option disabled selected>
            @if(isset($empleado))
            @if (isset($empleado->RH_id()->r))

            {{$empleado->RH_id()->r}}
            @else
            Seleccione
            @endif
            @else
            Seleccione 
            @endif
            
        </option>
          @foreach ($rh as $r)
                      <option value="{{$r['id']}}">{{$r['r']}}</option>
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
          <option  disabled selected>Seleccione</option>
          <option  value="Masculino"@if (isset($empleado)) @if ($empleado->genero=='Masculino' ) selected @endif @endif>Masculino</option>
          <option  value="Femenino" @if (isset($empleado))@if ($empleado->genero=='Femenino' ) selected @endif @endif>Femenino</option>
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
          <option  disabled selected>Seleccione</option>
          <option  value="Soltero(a)"@if (isset($empleado)) @if ($empleado->fk_estadoCivil=='Soltero(a)' ) selected @endif @endif >Soltero(a)</option>
          <option  value="Casado(a)"@if (isset($empleado)) @if ($empleado->fk_estadoCivil=='Casado(a)' ) selected @endif @endif>Casado(a)</option>
          <option  value="Viudo(a)" @if (isset($empleado))@if ($empleado->fk_estadoCivil=='Viudo(a)' ) selected @endif @endif>Viudo(a)</option>
          <option  value="Divorciado(a)" @if (isset($empleado))@if ($empleado->fk_estadoCivil=='Divorciado(a)' ) selected @endif @endif>Divorciado(a)</option>
          <option  value="Separado(a)"@if (isset($empleado)) @if ($empleado->fk_estadoCivil=='Separado(a)' ) selected @endif @endif>Separado(a)</option>
          <option  value="Comprometido(a)"@if (isset($empleado))@if ($empleado->fk_estadoCivil=='Comprometido(a)' ) selected @endif @endif>Comprometido(a)</option>
          <option  value="Union libre" @if (isset($empleado))@if ($empleado->fk_estadoCivil=='Union libre' ) selected @endif @endif>Union libre</option>
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
        <input type="date" name="fechaDeNacimiento" class="form-control @error('fechaDeNacimiento') is-invalid @enderror" @if (isset($empleado->fechaDeNacimiento))
        value="{{$empleado->fechaDeNacimiento->format('Y-m-d')}}" @else value="{{ old('fechaDeNacimiento') }}" @endif >
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
        <input id="telefono" type="text" maxlength="10" class="form-control @error('telefono') is-invalid @enderror"
        data-inputmask="'mask': '9999 9999 9999 9999'" name="telefono" @if (isset($empleado))
        value="{{$empleado->telefono}}"@else value="{{ old('telefono') }}" @endif   autofocus >
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
        <input type="text" maxlength="10" class="form-control @error('celular') is-invalid @enderror" name="celular" @if (isset($empleado))
        value="{{$empleado->celular}}"@else value="{{ old('celular') }}" @endif  >
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
        <input id="email" type="email" placeholder="Ej: name@hotmail.com" class="form-control @error('email') is-invalid @enderror" name="email" @if (isset($empleado))
        value="{{$empleado->email}}" @else value="{{ old('email') }}" @endif  >
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
        <input id="password" maxlength="10" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password"  >
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
        <input id="direccion" type="text" maxlength="30" class="form-control @error('direccion') is-invalid @enderror" name="direccion" @if (isset($empleado))
        value="{{ucwords($empleado->direccion)}}"@else value="{{ old('direccion') }}" @endif   autofocus >
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
          <option  disabled selected>Seleccione</option>
          <option  value="Rural"  @if (isset($empleado))
          @if ($empleado->zona=='Rural' ) selected @endif
          @endif>Rural</option>
          <option  value="Urbana" 
          @if (isset($empleado))
          @if ($empleado->zona=='Urbana' ) selected @endif
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
        <select class="form-control @error('fk_departamento') is-invalid @enderror" id="fk_departamento" name="fk_departamento" value="{{ old('fk_departamento') }}"  autofocus >
          <option disabled selected>
            @if(isset($empleado))
            @if (isset($empleado->departamento_id()->nombre))
            {{$empleado->departamento_id()->nombre}}
            @else
             seleccione departamento
            @endif 
            @else  
            seleccione departamento 
            @endif
            
          </option>>   
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
        <label for="fk_municipio">{{ __('Municipio:')}}</label>
        <select class="form-control @error('fk_municipio') is-invalid @enderror" id="fk_municipio" name="fk_municipio" value="{{ old('fk_municipio') }}"  autofocus>
          <option disabled selected>
            @if(isset($empleado))
            @if (isset($empleado->municipio_id()->nombre))
            {{$empleado->municipio_id()->nombre}}
            @else
            seleccione primero el departamento
            @endif
            @else
            seleccione primero el departamento
            @endif
            
            </option>   
        </select>
        @error('fk_municipio')
      <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
      </span>
      @enderror
      </div>
    </div>
  </div>

  @include('themes.includes.empleados.roles')
</div>

</div>

  @section('script')
   

   @include('themes.includes.user.municipio.ajax_municipio')
@endsection