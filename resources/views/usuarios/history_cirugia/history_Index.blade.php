@extends('themes.layaoutT')


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('pacient.files', $usuario)}}">Archivo</a></li>
<li class="breadcrumb-item active">Historia Clinica</li>
@endsection

@section('cont')

    <div class="col-10 " style="margin:auto">
      <div class="card">
        <div class="card-header ">
        <h3 class="card-title">Historias Clinicas Cirugía {{ucwords($usuario->nombres)}}</h3>

            
        </div>
     
        <!-- /.card-header -->
        <div class="card-body table-responsive  p-0">
          <table class="table table-hover  text-nowrap">
            <thead >
              <tr>
                <th>Creado</th>
                <th>Nombres</th>
          
                <th>
                  @role('Doctor')
                  @can('crear historia clinica cirugia')
                  <a href="{{route('surgery.create', $usuario)}}" class="btn btn-success btn-sm float-right" >Crear Historia</a>
                  @endcan
                  @endrole
                </th>
                
              </tr>
            </thead>
            <tbody>
          
            @foreach ($surgery as $sur)
            <tr>
              <input type="hidden" class="dele_user_value" value="{{$sur->id}}">
              <td scope="row">{{$sur->created_at->format('Y/m/d g:i A')}}</td>
              <td>Historia</td>

              <td>
                @role('Doctor')
                @can('editar historia clinica cirugia')
                <a class="btn btn-info btn-sm" href="{{route('surgery.edit', [$usuario, $sur])}}" ><i class="fas fa-pencil-alt"></i> </a>
                @endcan
                @endrole
                <a class="btn  btn-success btn-sm" href="{{route('surgery.show', [$usuario, $sur])}}" ><i class="far fa-eye"></i> </a>  
                <a class="btn btn-info btn-sm" href="{{route('pdf_historia.cirugia', [$usuario, $sur])}}" ><i class="fas fa-download"></i> </a>        
              </td>
            </tr>
            @endforeach
          
              
              
            </tbody>
          </table>
        </div>
        
      </div>
    </div>

 
  


@endsection