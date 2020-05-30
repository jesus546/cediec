@extends('themes.layaoutT')

@section('cont')
    <div class="row">
      <div class="col-md-7" style="margin: auto">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Editar Permiso </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('permissions.update', $permission)}}">
              @method('PUT')
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Nombre del permiso</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" value="{{$permission->name}}">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="roles_id">Rol</label>
                  <select class="form-control @error('roles_id') is-invalid @enderror" id="roles_id" name="roles_id" >
                  <option value="{{$permission->roles_id}}" disabled selected >{{$permission->roles_id}}</option>
                 @foreach ($roles as $role)
                  <option value="{{$role->id}}">{{$role->name}}</option>
                 @endforeach
                 </select>
                 @error('roles_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
             </div>
                <div class="form-group">
                  <label for="description">Descripción del permiso</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{$permission->description}}">
                  @error('description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
                </div>
              </div>
                
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Actualizar</button>
              </div>
            </form>
          </div>

      </div>
    </div>
@endsection