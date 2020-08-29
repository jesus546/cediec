@extends('themes/layaoutT')



@section('cont')
<div class="row">
    <div class="col-md-8" style="margin: auto">
        <div class="card">
          <div class="card-body">
            <div class="tab-pane" id="settings">
                <div class="post">
            
                <form  method="POST" action="{{route('password_update')}}">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                        <label for="old_password">Contraseña Actual</label>
                        <input type="password" id="old_password " maxlength="10" class="form-control col-md-4 @error('old_password') is-invalid @enderror" name="old_password" aria-describedby="passwordHelpInline">
                        @error('old_password')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                       </span>
                      @enderror
                      </div>
                      <div class="form-group">
                        <label for="password">Nueva Contraseña</label>
                        <input type="password" id="password" maxlength="10" class="form-control col-md-4 @error('password') is-invalid @enderror" name="password" aria-describedby="passwordHelpInline">
                        <small id="passwordHelpInline" class="text-muted">
                          maximo entre 8 y 10 caracteres.
                        </small>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                       </span>
                      @enderror
                      </div>
                      <div class="form-group">
                        <label for="password-confirm">Confirmar Contraseña</label>
                        <input type="password" id="password-confirm" maxlength="10" class="form-control col-md-4" name="password_confirmation" aria-describedby="passwordHelpInline">
                        <small id="passwordHelpInline" class="text-muted">
                          maximo entre 8 y 10 caracteres.
                        </small>
                      </div>
                      <button type="submit" class="btn btn-primary float-right">Actualizar</button>
                    </form>
              
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection