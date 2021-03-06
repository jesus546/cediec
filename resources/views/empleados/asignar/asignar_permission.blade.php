@extends('themes.layaoutT')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('empleados.index')}}">Empleados</a></li>
<li class="breadcrumb-item active">Asignar o Editar Permisos</li>
@endsection
@section('cont')
<div class="col-md-7" style="margin: auto">
    <div class="card card-info " >
        <div class="card-header">
          <h3 class="card-title">Asignar o Editar Permisos  a {{ucwords($empleado->nombres)}}</h3>
        </div>
        
        <div class="card-body">
        <form action="{{route('empleados.permission_assignment', $empleado->id)}}" method="POST">
              @csrf
              <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-10">
                      <!-- checkbox -->
                      <div class="form-group">
                        @foreach ($permissions as $permission)
                        <div class="form-check">
                        <input class="form-check-input" 
                        id="{{$permission->id}}" 
                        value="{{$permission->id}}"
                        name="permissions[]"
                        @if ($empleado->hasPermissionTo($permission->id))
                            checked
                        @endif
                        type="checkbox">
                            <label for="{{$permission->id}}" class="form-check-label">
                              <span>{{ucwords($permission->name)}}</span>
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