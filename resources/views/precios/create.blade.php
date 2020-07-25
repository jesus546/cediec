@extends('themes.layaoutT')

@section('cont')
<div class="col-md-5" style="margin: auto">
    <div class="card card-info " >
        <div class="card-header">
          <h3 class="card-title">Crear especialidades</h3>
        </div>
        
        <div class="card-body">
        <form action="{{route('price.store')}}" method="POST">
              @csrf
              <div class="col-sm-10">
                <div class="form-group">
                  <label for="precio" >precio:</label>
                  <input id="precio" type="text" class="form-control  @error('precio') is-invalid @enderror" name="precio" value="{{ old('precio') }}"  autofocus >
                  @error('precio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
              </div>
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
                 
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-info">Guardar</button>
      </div>
      </form>
    </div>
</div>

@endsection