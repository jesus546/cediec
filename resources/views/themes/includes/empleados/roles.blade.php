          <hr style=" background-color: black;">
          <div class="form-group">
            <label for="roles[]">Editar o asignar roles</label>
            @foreach ($roles as $role)
            <div class="form-check">
            <input class="form-check-input" 
            id="{{$role->id}}" 
            value="{{$role->id}}"
            name="roles[]"
            @if (isset($empleado))
            @if ($empleado->hasRole($role->id))
            checked
            @endif
            @endif
            
            type="checkbox">
                <label for="{{$role->id}}" class="form-check-label">
                  <span>{{$role->name}}</span>
                </label>
              </div>
            @endforeach
            
          