@extends('themes/layaoutT')

@section('cont')
<div class="row">
  <div class="col-md-10" style="margin: auto">
    <div class="card card-info " >
        <div class="card-header">
          <h3 class="card-title">Crear o actualizar historia clinica</h3>
        </div>
        
        <div class="card-body">
        <form action="{{route('clinic_data.store', $usuario)}}"   method="POST">
              @csrf
              <div class="form-group">
 
                <label for="check_in">Fecha de alta:</label>
                <input 
                        id="check_in" 
                        type="date"
                        class="form-control form-control-sm col-md-4"
                        name="check_in" 
                        value="{{ $usuario->clinic_data('check_in', $datas) }}"
                    >
               
              </div>
              
              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="acompañante">Acompañante:</label>
                    <input 
                            id="acompañante" 
                            type="text"
                            class="form-control form-control-sm "
                            name="acompañante" 
                            value="{{ $usuario->clinic_data('acompañante', $datas) }}">
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
                            value="{{ $usuario->clinic_data('telefono', $datas) }}"
                        >
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label for="fk_parentezco">Parentezco:</label>
                   <select class="form-control form-control-sm  " id="fk_parentezco" name="fk_parentezco" value="{{ $usuario->clinic_data('fk_parentezco', $datas) }}">
                       <option  disabled selected> @if ( !is_null($usuario->clinic_data('fk_parentezco', $datas))) {{ $usuario->clinic_data('fk_parentezco', $datas) }} @else Seleccione @endif </option>
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

              <div class="col-md-12">
              <div class="form-group">
                <label for="motivo_consulta"  ><h6><strong > Motivo De Consulta</strong></h6></label>
                <textarea class="form-control" name="motivo_consulta" id="motivo_consulta" rows="3" value="{{ $usuario->clinic_data('motivo_consulta', $datas) }}">{{ ucfirst($usuario->clinic_data('motivo_consulta', $datas)) }}</textarea>
              </div>

              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label for="enfermedad_actual"  ><h6><strong > Enfermedad Actual</strong></h6></label>
                  <textarea class="form-control" name="enfermedad_actual" id="enfermedad_actual" rows="3" value="{{ $usuario->clinic_data('enfermedad_actual', $datas) }}">{{ ucfirst($usuario->clinic_data('enfermedad_actual', $datas)) }}</textarea>
                </div>
  
                </div>
                 
               
    
                <div class="form-row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="talla">Talla(cms):</label>
                      <input 
                              id="talla" 
                              type="text"
                              class="form-control form-control-sm "
                              name="talla" 
                              value="{{ $usuario->clinic_data('talla', $datas) }}">
                  </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="peso">Peso(kg):</label>
                      <input 
                              id="peso" 
                              type="text"
                              class="form-control form-control-sm "
                              name="peso" 
                              value="{{ $usuario->clinic_data('peso', $datas) }}">
                  </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="IMC">IMC:</label>
                      <input 
                              id="IMC" 
                              type="text"
                              class="form-control form-control-sm "
                              name="IMC" 
                              value="{{ $usuario->clinic_data('IMC', $datas) }}">
                  </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="temperatura">T°:</label>
                      <input 
                              id="temperatura" 
                              type="text"
                              class="form-control form-control-sm "
                              name="temperatura" 
                              value="{{ $usuario->clinic_data('temperatura', $datas) }}">
                  </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="frecuencia-respiratoria">Frecuencia Respiratoria:</label>
                      <input 
                              id="frecuencia-respiratoria" 
                              type="text"
                              class="form-control form-control-sm "
                              name="frecuencia-respiratoria" 
                              value="{{ $usuario->clinic_data('frecuencia-respiratoria', $datas) }}">
                  </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="frecuencia-cardiaca">Frecuencia Cardiaca(L/mln):</label>
                      <input 
                              id="frecuencia-cardiaca" 
                              type="text"
                              class="form-control form-control-sm "
                              name="frecuencia-cardiaca" 
                              value="{{ $usuario->clinic_data('frecuencia-cardiaca', $datas) }}">
                  </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="presion-arterial">Presion Arterial(mmHg):</label>
                      <input 
                              id="presion-arterial" 
                              type="text"
                              class="form-control form-control-sm "
                              name="presion-arterial" 
                              value="{{ $usuario->clinic_data('presion-arterial', $datas) }}">
                  </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="P_ABD">P.ABD(cms):</label>
                      <input 
                              id="P_ABD" 
                              type="text"
                              class="form-control form-control-sm "
                              name="P_ABD" 
                              value="{{ $usuario->clinic_data('P_ABD', $datas) }}">
                  </div>
                  </div>
                </div>
                
                <div class="form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="ojos"  ><h6><strong > Ojos:</strong></h6></label>
                  <textarea class="form-control" name="ojos" id="ojos" rows="3" value="{{ $usuario->clinic_data('ojos', $datas) }}">{{ ucfirst($usuario->clinic_data('ojos', $datas)) }}</textarea>
                </div>
  
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="orl"  ><h6><strong > ORL:</strong></h6></label>
                    <textarea class="form-control" name="orl" id="orl" rows="3" value="{{ $usuario->clinic_data('orl', $datas) }}">{{ ucfirst($usuario->clinic_data('orl', $datas) ) }}</textarea>
                  </div>
    
                  </div>
                </div>  

                <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="cardio-vascular"  ><h6><strong > Cardio Vascular:</strong></h6></label>
                      <textarea class="form-control" name="cardio-vascular" id="cardio-vascular" rows="3" value="{{ $usuario->clinic_data('cardio-vascular', $datas) }}">{{ ucfirst($usuario->clinic_data('cardio-vascular', $datas)) }}</textarea>
                    </div>
      
                    </div>
    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="cuello"  ><h6><strong > Cuello:</strong></h6></label>
                        <textarea class="form-control" name="cuello" id="cuello" rows="3" value="{{ $usuario->clinic_data('cuello', $datas) }}">{{  ucfirst( $usuario->clinic_data('cuello', $datas) ) }}</textarea>
                      </div>
        
                      </div>
                    </div> 

                    <div class="form-row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="genito-urinario"  ><h6><strong > Genito Urinario:</strong></h6></label>
                          <textarea class="form-control" name="genito-urinario" id="genito-urinario" rows="3" value="{{ $usuario->clinic_data('genito-urinario', $datas) }}">{{ ucfirst($usuario->clinic_data('genito-urinario', $datas)) }}</textarea>
                        </div>
          
                        </div>
        
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="extremidades"  ><h6><strong > Extremidades:</strong></h6></label>
                            <textarea class="form-control" name="extremidades" id="extremidades" rows="3" value="{{ $usuario->clinic_data('extremidades', $datas) }}">{{ ucfirst($usuario->clinic_data('extremidades', $datas)) }}</textarea>
                          </div>
            
                          </div>
                        </div> 

                        <div class="form-row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="piel_anexos"  ><h6><strong > Piel Y Anexos:</strong></h6></label>
                              <textarea class="form-control" name="piel_anexos" id="piel_anexos" rows="3" value="{{ $usuario->clinic_data('piel_anexos', $datas) }}">{{ ucfirst($usuario->clinic_data('piel_anexos', $datas) )}}</textarea>
                            </div>
              
                            </div>
            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="pumonar"  ><h6><strong > Pulmonar:</strong></h6></label>
                                <textarea class="form-control" name="pulmonar" id="pulmonar" rows="3" value="{{ $usuario->clinic_data('pulmonar', $datas) }}">{{ ucfirst($usuario->clinic_data('pulmonar', $datas) )}}</textarea>
                              </div>
                
                              </div>
                            </div>

                            <div class="form-row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="musculo-esqueletico"  ><h6><strong > Musculo Esqueletico:</strong></h6></label>
                                  <textarea class="form-control" name="musculo-esqueletico" id="musculo-esqueletico" rows="3" value="{{ $usuario->clinic_data('musculo-esqueletico', $datas) }}">{{ ucfirst($usuario->clinic_data('musculo-esqueletico', $datas)) }}</textarea>
                                </div>
                  
                                </div>
                
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="neurologico"  ><h6><strong > Neurologico:</strong></h6></label>
                                    <textarea class="form-control" name="neurologico" id="neurologico" rows="3" value="{{ $usuario->clinic_data('neurologico', $datas) }}">{{ ucfirst($usuario->clinic_data('neurologico', $datas)) }}</textarea>
                                  </div>
                    
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="otros"  ><h6><strong > Otros:</strong></h6></label>
                                    <textarea class="form-control" name="otros" id="otros" rows="3" value="{{ $usuario->clinic_data('otros', $datas) }}">{{ ucfirst($usuario->clinic_data('otros', $datas)) }}</textarea>
                                  </div>
                    
                                  </div>
                                   
                              

                                      <div class="form-row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label for="amputacion"  ><h6><strong > Amputación:</strong></h6></label>
                                            <textarea class="form-control" name="amputacion" id="amputacion" rows="3" value="{{ $usuario->clinic_data('amputacion', $datas) }}">{{ ucfirst($usuario->clinic_data('amputacion', $datas)) }}</textarea>
                                          </div>
                            
                                          </div>
                          
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label for="sensibilidad-Plantar"  ><h6><strong > Sensibilidad Plantar:</strong></h6></label>
                                              <textarea class="form-control" name="sensibilidad-Plantar" id="sensibilidad-Plantar" rows="3" value=" {{ $usuario->clinic_data('sensibilidad-Plantar', $datas) }}"> {{ ucfirst($usuario->clinic_data('sensibilidad-Plantar', $datas)) }}</textarea>
                                            </div>
                              
                                            </div>
                                          </div>
                                          <div class="form-row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label for="pulso"  ><h6><strong > Pulso:</strong></h6></label>
                                                <textarea class="form-control" name="pulso" id="pulso" rows="3" value="{{ $usuario->clinic_data('pulso', $datas) }}">{{ ucfirst($usuario->clinic_data('pulso', $datas)) }}</textarea>
                                              </div>
                                
                                              </div>
                              
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label for="piel"  ><h6><strong > Piel:</strong></h6></label>
                                                  <textarea class="form-control" name="piel" id="piel" rows="3" value=" {{$usuario->clinic_data('piel', $datas) }}"> {{ucfirst( $usuario->clinic_data('piel', $datas)) }}</textarea>
                                                </div>
                                  
                                                </div>
                                              </div>

                                              <div class="form-row">
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label for="alteracion-biomecanica"  ><h6><strong >Alteracion Biomecanica:</strong></h6></label>
                                                    <textarea class="form-control" name="alteracion-biomecanica" id="alteracion-biomecanica" rows="3" value=" {{ $usuario->clinic_data('alteracion-biomecanica', $datas) }}"> {{ ucfirst($usuario->clinic_data('alteracion-biomecanica', $datas)) }}</textarea>
                                                  </div>
                                    
                                                  </div>
                                  
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                      <label for="uñas"  ><h6><strong > Uñas(micosis):</strong></h6></label>
                                                      <textarea class="form-control" name="uñas" id="uñas" rows="3" value=" {{ $usuario->clinic_data('uñas', $datas) }}"> {{ucfirst( $usuario->clinic_data('uñas', $datas)) }}</textarea>
                                                    </div>
                                      
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
</div>
@endsection


