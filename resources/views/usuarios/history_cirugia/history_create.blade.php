@extends('themes/layaoutT')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('surgery.index', $usuario)}}">Historias Clinicas</a></li>
<li class="breadcrumb-item active">Crear Historia Clinica</li>
@endsection

@section('cont')
<div class="row">
    <div class="col-md-8" style="margin: auto">
      <div class="card card-info " >
          <div class="card-header">
          <h3 class="card-title">Crear Historia Clinica a {{ucwords($usuario->nombres)}}</h3>
          </div>
          
          <div class="card-body">
            <form action="{{ route('surgery.store', $usuario) }}" method="POST">
              @csrf
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="acompanate">Acompañante:</label>
                    <input 
                            id="acompañante" 
                            type="text"
                            class="form-control form-control-sm "
                            name="acompanate" 
                            value="{{ old('acompanate') }}">
                </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="telefono">Telefono:</label>
                    <input 
                            id="telefono" 
                            type="text"
                            class="form-control form-control-sm "
                            name="telefono" 
                            maxlength="10"
                            value="{{old('telefono') }}"
                        >
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label for="parentezco">Parentezco:</label>
                   <select class="form-control form-control-sm  " id="parentezco" name="parentezco" value="{{ old('parentezco') }}">
                       <option  disabled selected>  Seleccione </option>
                       <option  value="Hijo(a)" >Hijo(a)</option>
                       <option  value="Suegro(a)" >Suegro(a)</option>
                       <option  value="Padre" >Padre</option>
                       <option  value="Madre" >Madre</option>
                       <option  value="Abuelo(a)" >Abuelo(a)</option>
                       <option  value="Esposo(a)">Esposo(a)</option>
                       <option  value="Sobrino(a)" >Sobrino(a)</option>
                       <option  value="Tio(a)" >Tio(a)</option>
                       <option  value="Hermano(a)">Hermano(a)</option>
                       <option  value="Primo(a)" >Primo(a)</option>
                       <option  value="Yerno(a)" >Yerno(a)</option>
                       <option  value="Cuñado(a)" >Cuñado(a)</option>
                    </select>
                  </div>
                </div>
              </div>

      
              <div class="form-row">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="H_i_v"  ><h6><strong >H.I.V:</strong></h6></label>
                  <input class="form-control" id="H_i_v" name="H_i_v" rows="3" value="{{ old('H_i_v') }}">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="H_T_A"  ><h6><strong >H.T.A:</strong></h6></label>
                  <input class="form-control" id="H_T_A" name="H_T_A"  value="{{ old('H_T_A') }}">
                </div>
                </div>
               </div>
               <div class="form-row">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="tabaquismo"  ><h6><strong >Tabaquismo:</strong></h6></label>
                  <input class="form-control" id="tabaquismo" name="tabaquismo"  value="{{ old('tabaquismo') }}">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="alergias"  ><h6><strong >Alergias:</strong></h6></label>
                  <input class="form-control" id="alergias" name="alergias"  value="{{ old('alergias') }}">
                </div>
                </div>
               </div>

               <div class="form-row">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="hepatitis"  ><h6><strong >Hepatitis:</strong></h6></label>
                  <input class="form-control" id="hepatitis" name="hepatitis"  value="{{ old('hepatitis') }}">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="cardiopatias"  ><h6><strong >Cardiopatias:</strong></h6></label>
                  <input class="form-control" id="cardiopatias" name="cardiopatias"  value="{{ old('cardiopatias') }}">
                </div>
                </div>
               </div>

               <div class="form-group">
                <label for="diabetes"  ><h6><strong >Diabetes:</strong></h6></label>
                <input class="form-control" id="diabetes" name="diabetes"  value="{{ old('diabetes') }}">
              </div>
               <div class="form-group">
                <label for="MC"  ><h6><strong >MC:</strong></h6></label>
                <textarea class="form-control" id="MC" name="MC" rows="3" value="{{ old('MC') }}"></textarea>
              </div>

              <div class="form-group">
                <label for="E_E_A"  ><h6><strong >E.E.A:</strong></h6></label>
                <textarea class="form-control" id="E_E_A" name="E_E_A" rows="3" value="{{ old('E_E_A') }}"></textarea>
              </div>

              <div class="form-group">
                <label for="examen_fisico"  ><h6><strong >Examen Fisico:</strong></h6></label>
                <textarea class="form-control" id="examen_fisico" name="examen_fisico" rows="3" value="{{ old('examen_fisico') }}"></textarea>
              </div>
              <div class="form-group">
                <label for="diagnostico"  ><h6><strong >Diagnostico:</strong></h6></label>
                <textarea class="form-control" id="diagnostico" name="diagnostico" rows="3" value="{{ old('diagnostico') }}"></textarea>
              </div>
              <div class="form-group">
                <label for="conducta"  ><h6><strong >Conducta:</strong></h6></label>
                <textarea class="form-control" id="conducta" name="conducta" rows="3" value="{{ old('conducta') }}"></textarea>
              </div>
             
            
      </div>
      <div class="card-footer">
        <button type="submit"  id="enviar" class="btn btn-info">Guardar</button>
     </div>
    </form>
    </div>
</div>
@endsection