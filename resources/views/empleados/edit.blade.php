@extends('themes/layaoutT')

@section('style')
<link rel="stylesheet" href="{{asset("plugins/select2/css/select2.min.css")}}">

@endsection

@section('cont')
<div class="col-md-9" style="margin:auto" >
  <div class="card card-primary " >
    <div class="card-header">
      <h3 class="card-title">Registrar</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
  <form role="form" action="{{route('empleados.update', $empleado->id)}}" method="POST">
    @method('PUT')
    @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-sm-3">
            <div class="form-group">
              <label for="fk_tipoDeidentificacion">{{ __('Tipo De Identificación:')}}</label>
                            <select class="form-control" id="fk_tipoDeidentificacion" name="fk_tipoDeidentificacion" value="" required autocomplete="fk_tipoDeidentificacion" autofocus>
                              
                            @foreach ($tipoIdentificacion as $tipoidenti)
                            <option value="{{$tipoidenti['tipoDeIden_ID']}}">{{$tipoidenti['tipo']}}</option>
                            @endforeach
                            </select>
            </div>
          </div>
          <div class="col-sm-2">
            <!-- text input -->
            <div class="form-group">
              <label for="identificacion" >Identificacion:</label>
              <input id="identificacion" type="text" maxlength="10"  class="form-control" name="identificacion" value="{{ $empleado->identificacion }}" >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label for="nombres" >Nombres:</label>
              <input id="nombres" type="text" class="form-control" name="nombres" value="{{ $empleado->nombres }}"  >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Apellidos:</label>
              <input type="text" class="form-control" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>RH:</label>
              <select class="form-control ">
                <option>A+</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>

          <div class="col-sm-2">
            <div class="form-group">
              <label for="genero">Genero:</label>
                <select class="form-control form-control-sm" id="genero" name="genero" value="{{ old('genero') }}">
                  <option  value="Masculino"  @if ($empleado->genero=='Masculino' ) selected @endif>Masculino</option>
                  <option  value="Femenino" @if ($empleado->genero=='Femenino' ) selected @endif>Femenino</option>
              </select>
            </div>
          </div>

          <div class="col-sm-2">
            <div class="form-group">
              <label>Estado Civil:</label>
              <select class="form-control ">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Fecha:</label>
              <input type="text" class="form-control" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Telefono:</label>
              <input type="text" class="form-control" placeholder="Enter ..." >
            </div>
          </div>

          <div class="col-sm-2">
            <div class="form-group">
              <label>Celular:</label>
              <input type="text" class="form-control" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label  for="email">Email:</label>
              <input id="email" type="email" placeholder="Ej: name@hotmail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $empleado->email }}"  >
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
              <input input id="password" maxlength="8" type="password" class="form-control" name="password"  >
            </div>
          </div>
        
          <div class="col-sm-2">
            <div class="form-group">
              <label>Ocupacion:</label>
              <input type="text" class="form-control" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Direccion:</label>
              <input type="text" class="form-control" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label for="zona">Zona:</label>
              <select class="form-control form-control-sm" id="zona" name="zona" value="{{ old('zona') }}">
                <option  value="Urbana"@if ($empleado->zona=='Urbana' ) selected @endif >Urbana</option>
                <option  value="Rural" @if ($empleado->zona=='Rural' ) selected @endif >Rural</option>
                
                
              
            </select>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Departamento:</label>
              <select class="form-control ">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
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
        </div>
        <hr style=" background-color: black;">
          <div class="form-group">
            <label for="roles[]">Editar o asignar roles</label>
            @foreach ($roles as $role)
            <div class="form-check">
            <input class="form-check-input" 
            id="{{$role->id}}" 
            value="{{$role->id}}"
            name="roles[]"
            @if ($empleado->hasRole($role->id))
                            checked
            @endif
            type="checkbox">
                <label for="{{$role->id}}" class="form-check-label">
                  <span>{{$role->name}}</span>
                </label>
              </div>
            @endforeach
            
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

