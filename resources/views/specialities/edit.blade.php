@extends('themes.layaoutT')

@section('cont')
<div class="col-md-5" style="margin: auto">
    <div class="card card-info " >
        <div class="card-header">
          <h3 class="card-title">Crear especialidades</h3>
        </div>
        
        <div class="card-body">
        <form action="{{route('specialities.update', $specialities->id)}}" method="POST">
             @method('PUT')
              @csrf
              
              <div class="col-sm-10">
                <div class="form-group">
                  <label for="name" >Nombre de especialidad:</label>
                  <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{$specialities->name}}"  >
                  @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
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