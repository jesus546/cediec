@extends('themes.layaoutT')

@section('cont')
<div class="col-md-5" style="margin: auto">
    <div class="card card-info " >
        <div class="card-header">
          <h3 class="card-title">editar precio</h3>
        </div>
        
        <div class="card-body" >
        <form action="{{route('price.update', $price)}}" method="POST">
             @method('PATCH')
             @csrf
              
              <div class="col-sm-10">
                <div class="form-group">
                  <label for="precio" >precio:</label>
                  <input id="precio" type="text" class="form-control  @error('precio') is-invalid @enderror" name="precio" value="{{ $price->precio }}"  autofocus >
                  @error('precio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
              </div>
              <div class="col-sm-10">
                <!-- checkbox -->
                <div class="form-group">
                  <label for="regime_id">{{ __('regimen:')}}</label>
                  <select class="form-control " id="regime_id" name="regime_id" >
                   
                  @foreach ($regimes as $regime)
                  <option 
                    @if ($price->regime_id($regime->id))
                      selected 
                    @endif
                    value="{{$regime['id']}}">{{$regime['name']}}</option>
                  @endforeach
                  </select>

                </div>
              </div>
                 
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-info">Guardar</button>
      </div>
      </form>
    </div>
</div>

@endsection