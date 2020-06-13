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
                            <select class="form-control form-control-sm" id="fk_tipoDeidentificacion" name="fk_tipoDeidentificacion" value="" required autocomplete="fk_tipoDeidentificacion" autofocus>
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
              <input id="identificacion" type="text" maxlength="10"  class="form-control form-control-sm" name="identificacion" value="{{ $usuario->identificacion }}" >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label for="nombres" >Nombres:</label>
              <input id="nombres" type="text" class="form-control form-control-sm" name="nombres" value="{{ $usuario->nombres }}"  >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Apellidos:</label>
              <input type="text" class="form-control form-control-sm" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>RH:</label>
              <select class="form-control form-control-sm ">
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
                  <option  value="Masculino"  @if ($usuario->genero=='Masculino' ) selected @endif>Masculino</option>
                  <option  value="Femenino" @if ($usuario->genero=='Femenino' ) selected @endif>Femenino</option>
              </select>
            </div>
          </div>

          <div class="col-sm-2">
            <div class="form-group">
              <label>Estado Civil:</label>
              <select class="form-control form-control-sm">
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
              <input type="text" class="form-control form-control-sm" placeholder="Enter ..." >
            </div>
          </div>
        
        
          <div class="col-sm-2">
            <div class="form-group">
              <label>Telefono:</label>
              <input type="text" class="form-control form-control-sm" placeholder="Enter ..." >
            </div>
          </div>

          <div class="col-sm-2">
            <div class="form-group">
              <label>Celular:</label>
              <input type="text" class="form-control form-control-sm" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label  for="email">Email:</label>
              <input id="email" type="email" placeholder="Ej: name@hotmail.com" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}"  >
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
              <input input id="password" maxlength="8" type="password" class="form-control form-control-sm" name="password"  >
            </div>
          </div>
        
          <div class="col-sm-2">
            <div class="form-group">
              <label>Ocupacion:</label>
              <input type="text" class="form-control form-control-sm" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Direccion:</label>
              <input type="text" class="form-control form-control-sm" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label for="zona">Zona:</label>
              <select class="form-control form-control-sm" id="zona" name="zona" value="{{ old('zona') }}">
                <option  value="Urbana"@if ($usuario->zona=='Urbana' ) selected @endif >Urbana</option>
                <option  value="Rural" @if ($usuario->zona=='Rural' ) selected @endif >Rural</option>
                
                
              
            </select>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Departamento:</label>
              <select class="form-control form-control-sm ">
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
              <select class="form-control form-control-sm ">
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
              <input type="text" class="form-control form-control-sm" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Telefono:</label>
              <input type="text" class="form-control form-control-sm" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Parentezco:</label>
              <select class="form-control form-control-sm ">
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
              <label>Religion:</label>
              <select class="form-control form-control-sm ">
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
              <label>Discapacidad:</label>
              <select class="form-control  form-control-sm">
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
              <label>Nivel Educativo:</label>
              <select class="form-control form-control-sm">
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
              <label>Parentezco:</label>
              <select class="form-control form-control-sm">
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
              <label>Grupo etnico:</label>
              <select class="form-control form-control-sm ">
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
              <label>Poblacion Riesgo:</label>
              <select class="form-control form-control-sm ">
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
              <label>Tipo de aseguradora:</label>
              <select class="form-control form-control-sm">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group form-control-sm">
              <label>Aseguradora:</label>
              <select class="form-control form-control-sm ">
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
      </div>
      <!-- /.card-body -->
     
      <div class="card-footer">
      <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
     
    </form>
  </div>
</div>


@endsection

