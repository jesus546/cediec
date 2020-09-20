@extends('themes/layaoutT')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('surgery.index', $usuario)}}">Historias Clinicas</a></li>
<li class="breadcrumb-item active">Editar Historia Clinica</li>
@endsection

@section('cont')
<div class="row">
    <div class="col-md-7" style="margin: auto">
      <div class="card card-info " >
          <div class="card-header">
          <h3 class="card-title">Editar Historia Clinica {{ucwords($usuario->nombres)}}</h3>
          </div>
          
          <div class="card-body">
            <form action="{{ route('surgery.update', [$usuario, $surgery]) }}" method="POST">
               
              @csrf
              @method('PUT')
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="acompanate">Acompañante:</label>
                    <input 
                            id="acompanante" 
                            type="text"
                            class="form-control form-control-sm "
                            name="acompanate" 
                            value="{{ $surgery->acompanate }}">
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
                            value="{{ $surgery->telefono }}"
                        >
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label for="parentezco">Parentezco:</label>
                   <select class="form-control form-control-sm  " id="parentezco" name="parentezco" value="{{ $surgery->parentezco}}">
                    <option  disabled selected>Seleccione</option>
                    <option  value="Hijo(a)"  @if ($surgery->parentezco=='Hijo(a)' ) selected @endif>Hijo(a)</option>
                    <option  value="Suegro(a)"  @if ($surgery->parentezco=='Suegro(a)' ) selected @endif>Suegro(a)</option>
                    <option  value="Padre"  @if ($surgery->parentezco=='Padre' ) selected @endif >Padre</option>
                    <option  value="Madre" @if ($surgery->parentezco=='Madre' ) selected @endif >Madre</option>
                    <option  value="Abuelo(a)"  @if ($surgery->parentezco=='Abuelo(a)' ) selected @endif >Abuelo(a)</option>
                    <option  value="Esposo(a)"  @if ($surgery->parentezco=='Esposo(a)' ) selected @endif >Esposo(a)</option>
                    <option  value="Sobrino(a)"  @if ($surgery->parentezco=='Sobrino(a)' ) selected @endif >Sobrino(a)</option>
                    <option  value="Tio(a)" ) @if ($surgery->parentezco=='Tio(a)' ) selected @endif >Tio(a)</option>
                    <option  value="Hermano(a)"  @if ($surgery->parentezco=='Hermano(a)' ) selected @endif >Hermano(a)</option>
                    <option  value="Primo(a)"  @if ($surgery->parentezco=='Primo(a)' ) selected @endif >Primo(a)</option>
                    <option  value="Yerno(a)"  @if ($surgery->parentezco=='Yerno(a)' ) selected @endif >Yerno(a)</option>
                    <option  value="Cuñado(a)"  @if ($surgery->parentezco=='Cuñado(a)' ) selected @endif >Cuñado(a)</option>
                    </select>
                  </div>
                </div>
              </div>

      
              <div class="form-row">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="H_i_v"  ><h6><strong >H.I.V:</strong></h6></label>
                  <input class="form-control" id="H_i_v" name="H_i_v" rows="3" value="{{ $surgery->H_i_v}}">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="H_T_A"  ><h6><strong >H.T.A:</strong></h6></label>
                  <input class="form-control" id="H_T_A" name="H_T_A"  value="{{ $surgery->H_T_A }}">
                </div>
                </div>
               </div>
               <div class="form-row">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="tabaquismo"  ><h6><strong >Tabaquismo:</strong></h6></label>
                  <input class="form-control" id="tabaquismo" name="tabaquismo"  value="{{ $surgery->tabaquismo }}">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="alergias"  ><h6><strong >Alergias:</strong></h6></label>
                  <input class="form-control" id="alergias" name="alergias"  value="{{ $surgery->alergias }}">
                </div>
                </div>
               </div>

               <div class="form-row">
                <div class="col-md-6">
                <div class="form-group">
                  <label for="hepatitis"  ><h6><strong >Hepatitis:</strong></h6></label>
                  <input class="form-control" id="hepatitis" name="hepatitis"  value="{{ $surgery->hepatitis }}">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="cardiopatias"  ><h6><strong >Cardiopatias:</strong></h6></label>
                  <input class="form-control" id="cardiopatias" name="cardiopatias"  value="{{ $surgery->cardiopatias }}">
                </div>
                </div>
               </div>

               <div class="form-group">
                <label for="diabetes"  ><h6><strong >Diabetes:</strong></h6></label>
                <input class="form-control" id="diabetes" name="diabetes"  value="{{ $surgery->diabetes }}">
              </div>
               <div class="form-group">
                <label for="MC"  ><h6><strong >MC:</strong></h6></label>
                <textarea class="form-control" id="MC" name="MC" rows="3" value="{{ $surgery->MC }}">{{ $surgery->MC }}</textarea>
              </div>

              <div class="form-group">
                <label for="E_E_A"  ><h6><strong >E.E.A:</strong></h6></label>
                <textarea class="form-control" id="E_E_A" name="E_E_A" rows="3" value="{{ $surgery->E_E_A }}">{{ $surgery->E_E_A }}</textarea>
              </div>

              <div class="form-group">
                <label for="examen_fisico"  ><h6><strong >Examen Fisico:</strong></h6></label>
                <textarea class="form-control" id="examen_fisico" name="examen_fisico" rows="3" value="{{$surgery->examen_fisico }}">{{$surgery->examen_fisico }}</textarea>
              </div>
              <div class="form-group">
                <label for="diagnostico"  ><h6><strong >Diagnostico:</strong></h6></label>
                <textarea class="form-control" id="diagnostico" name="diagnostico" rows="3" value="{{ $surgery->diagnostico }}">{{ $surgery->diagnostico }}</textarea>
              </div>
              <div class="form-group">
                <label for="conducta"  ><h6><strong >Conducta:</strong></h6></label>
                <textarea class="form-control" id="conducta" name="conducta" rows="3" >{{ $surgery->conducta }}</textarea>
              </div>
             
      </div>
      <div class="card-footer">
        <button type="submit"  id="enviar" class="btn btn-info">Guardar</button>
     </div>
   </form>
    </div>
</div>
@endsection