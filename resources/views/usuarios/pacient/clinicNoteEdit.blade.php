@extends('themes/layaoutT')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('clinic_note.index', $usuario)}}">Notas</a></li>
<li class="breadcrumb-item active">Editar Nota </li>
@endsection

@section('cont')
<div class="row">
    <div class="col-md-7" style="margin: auto">
      <div class="card card-info " >
          <div class="card-header">
          <h3 class="card-title">Editar Nota a {{ucwords($usuario->nombres)}}</h3>
          </div>
          
          <div class="card-body">
            <form action="{{ route('clinic_note.update', [$usuario, $clinic_note]) }}" method="POST">
              @csrf
              @method('PUT')
               
                <div class="form-group">
                  <label for="description"  ><h6><strong >Evolución:</strong></h6></label>
                <textarea class="form-control" id="description" name="description" rows="3">{{$clinic_note->description}}</textarea>
                </div>
                <div class="form-group">
                  <label for="laboratorio"  ><h6><strong >Laboratorio:</strong></h6></label>
                  <textarea class="form-control" id="laboratorio" name="laboratorio" rows="3" value="{{ old('laboratorio') }}">{{$clinic_note->laboratorio}}</textarea>
                </div>
                <div class="form-group">
                  <label for="plan_de_manejo"  ><h6><strong >Plan De Manejo:</strong></h6></label>
                  <textarea class="form-control" id="plan_de_manejo" name="plan_de_manejo" rows="3" value="{{ old('plan_de_manejo') }}">{{$clinic_note->plan_de_manejo}}</textarea>
                </div>
                <div class="form-group">
                  <label for="conducta"  ><h6><strong >Conducta:</strong></h6></label>
                  <textarea class="form-control" id="conducta" name="conducta" rows="3" value="{{ old('conducta') }}">{{$clinic_note->conducta}}</textarea>
                </div>
               </div>
             <div class="card-footer">
                 <button type="submit"  id="enviar" class="btn btn-info">Guardar</button>
              </div>
            </form>
      </div>
    </div>
</div>
@endsection