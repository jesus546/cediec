@extends('themes/layaoutT')

@section('cont')
<div class="row">
    <div class="col-md-7" style="margin: auto">
      <div class="card card-info " >
          <div class="card-header">
          <h3 class="card-title">Crear Nota a {{ucwords($usuario->nombres)}}</h3>
          </div>
          
          <div class="card-body">
            <form action="{{ route('clinic_note.store', $usuario) }}" method="POST">
              @csrf
            
            
                <div class="col-md-8">
                  <div class="form-group">
                  <label for="fk_parentezco">Parentezco:</label>
                     <select class="form-control form-control-sm  " id="privacy" name="privacy">
                         <option  disabled selected>Selecciona la opción de privacidad </option>
                         <option value="public">Pública</option>
                         <option value="private">Privada</option>
                      </select>
                    </div>
                  </div>
            
              <div class="col-md-8">
                <div class="form-group">
                  <label for="description"  ><h6><strong >Descripción:</strong></h6></label>
                  <textarea class="form-control" id="description" name="description" rows="3" value="{{ old('description') }}"></textarea>
                </div>
  
                </div>
            
              
              
           
               </div>
             <div class="card-footer">
                 <button type="submit"  id="enviar" class="btn btn-info">Guardar</button>
              </div>
            </form>
      </div>
    </div>
</div>
@endsection