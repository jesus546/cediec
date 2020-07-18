@extends('themes.layaoutT')

@section('cont')
<div class="row">
<div class="col-md-5" style="margin: auto">
    <div class="card card-info " >
        <div class="card-header">
          <h3 class="card-title">asignar eps y aseguradora precios</h3>
        </div>
        
           <div class="card-body">
          <form action="{{route('price_assignment.price', $price->id)}}" method="POST">
              @csrf
                
                    <div class="col-sm-7">
                      <!-- checkbox -->
                      <div class="form-group">
                        <label for="regime_id">{{ __('regimen:')}}</label>
                        <select class="form-control " id="regime_id" name="regime_id" >
                        <option disabled selected>Selecciona el regimen</option>   
                        @foreach ($regimes as $regime)
                        <option value="{{$regime['id']}}">{{$regime['name']}}</option>
                        @endforeach
                        </select>
    
                      </div>
                    </div>
            
                      <div class="col-sm-7">
                        <!-- checkbox -->
                        <div class="form-group">
                          @foreach ($aseguradora as $asegu)
                          <div class="form-check">
                          <input class="form-check-input" 
                          id="{{$asegu->id}}" 
                          value="{{$asegu->id}}"
                          name="aseguradora_id[]"
                          type="checkbox">
                              <label for="{{$asegu->id}}" class="form-check-label">
                                <span>{{$asegu->asegu}}</span>
                              </label>
                          </div>
                          @endforeach
                          
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