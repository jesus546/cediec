@extends('themes.layaoutT')

@section('cont')
    <div class="row">
      <div class="col-md-7" style="margin: auto">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Permisos</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('permissions.store')}}">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Nombre del permiso</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" >
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="roles_id">Rol</label>
                  <select class="form-control @error('roles_id') is-invalid @enderror" id="roles_id" name="roles_id" >
                   <option value="" disabled selected >selecciona un rol</option>
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
                  <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">
                  @error('description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
                </div>
              </div>
                
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
          </div>

      </div>
    </div>
@endsection