@extends('themes.layaoutT')

@section('cont')
    <div class="row">
      <div class="col-md-7" style="margin: auto">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Editar Rol </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{route('roles.update', $role)}}">
              @method('PUT')
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Nombre del rol</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" value="{{$role->name}}">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                
                <div class="form-group">
                  <label for="description">Descripción del rol</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{$role->description}}">
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