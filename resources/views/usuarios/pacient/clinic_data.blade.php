@extends('themes/layaoutT')

@section('cont')
<div class="row">
  <div class="col-md-8" style="margin: auto">
    <div class="card card-info " >
        <div class="card-header">
          <h3 class="card-title">Crear historia clinica</h3>
        </div>
        
        <div class="card-body">
        <form action="{{route('clinic_data.store', $usuario)}}" method="POST">
              @csrf
              <div class="row">
                <div class="input-field col s12">
                    <input 
                        id="check_in" 
                        type="date" 
                        name="check_in" 
                        value="{{ $usuario->clinic_data('check_in', $datas) }}"
                    >
                    <label for="check_in">Fecha de alta</label>
                    @if ($errors->has('check_in'))
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red">{{ $errors->first('check_in') }}</strong>
                        </span>
                    @endif
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input 
                    id="scholarship" 
                    type="text" 
                    name="scholarship" 
                    value="{{ $usuario->clinic_data('scholarship', $datas) }}"
                  >
                  <label for="scholarship">Escolaridad</label>
                  @if ($errors->has('scholarship'))
                          <span class="invalid-feedback" role="alert">
                              <strong style="color: red">{{ $errors->first('scholarship') }}</strong>
                          </span>
                      @endif
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <input 
                    id="hola" 
                    type="text" 
                    name="hola" 
                    value="{{ $usuario->clinic_data('hola', $datas) }}"
                  >
                  <label for="hola">hola</label>
                  @if ($errors->has('hola'))
                          <span class="invalid-feedback" role="alert">
                              <strong style="color: red">{{ $errors->first('hola') }}</strong>
                          </span>
                      @endif
                </div>
              </div>
                 
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-info">Guardar</button>
      </div>
      </form>
    </div>
   </div>   
</div>
@endsection
