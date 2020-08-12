@extends('themes.layaoutT')

@section('cont')
<div class="col-md-5" style="margin: auto">
    <div class="card card-info " >
        <div class="card-header">
          <h3 class="card-title">asignar especialidades</h3>
        </div>
        
        <div class="card-body">
        <form action="{{route('empleados.speciality_assignment', $empleado->id)}}" method="POST">
              @csrf
              <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-6">
                      <!-- checkbox -->
                      <div class="form-group">
                        @foreach ($specialities as $speciality)
                        <div class="form-check">
                        <input class="form-check-input" 
                        id="{{$speciality->id}}" 
                        value="{{$speciality->id}}"
                        name="specialities[]"
                        @if ($empleado->has_especiality($speciality->id))
                            checked
                        @endif
                        type="checkbox">
                            <label for="{{$speciality->id}}" class="form-check-label">
                              <span>{{$speciality->name}}</span>
                            </label>
                          </div>
                        @endforeach
                        
                      </div> 
                    </div>
                        
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

