@extends('themes/layaoutT')

@section('style')
<link rel="stylesheet" href="{{asset("plugins/select2/css/select2.min.css")}}">

@endsection

@section('cont')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Registrar Usuario</h1>
        </div>
        
      </div>
    </div><!-- /.container-fluid -->
  </section>
<div class="col-md-9" style="margin:auto" >
  <div class="card card-primary " >
    <div class="card-header">
      <h3 class="card-title">Registrar</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form">
      <div class="card-body">
        <div class="row">
          
          <div class="col-sm-3">
            <div class="form-group">
              <label>Tipo De Identificacion:</label>
              <select class="form-control ">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>

          <div class="col-sm-2">
            <!-- text input -->
            <div class="form-group">
              <label>Identificacion:</label>
              <input type="text" class="form-control" placeholder="Enter ...">
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Nombres:</label>
              <input type="text" class="form-control" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Apellidos:</label>
              <input type="text" class="form-control" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>RH:</label>
              <select class="form-control ">
                <option>A+</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>

          <div class="col-sm-2">
            <div class="form-group">
              <label>Genero:</label>
              <select class="form-control ">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>

          <div class="col-sm-2">
            <div class="form-group">
              <label>Estado Civil:</label>
              <select class="form-control ">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Fecha:</label>
              <input type="text" class="form-control" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Telefono:</label>
              <input type="text" class="form-control" placeholder="Enter ..." >
            </div>
          </div>

          <div class="col-sm-2">
            <div class="form-group">
              <label>Celular:</label>
              <input type="text" class="form-control" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Email:</label>
              <input type="text" class="form-control" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Ocupacion:</label>
              <input type="text" class="form-control" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Direccion:</label>
              <input type="text" class="form-control" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Zona:</label>
              <select class="form-control ">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Departamento:</label>
              <select class="form-control ">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Municipio:</label>
              <select class="form-control ">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label>Nombre Responsable:</label>
              <input type="text" class="form-control" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Telefono:</label>
              <input type="text" class="form-control" placeholder="Enter ..." >
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Parentezco:</label>
              <select class="form-control ">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>

          <div class="col-sm-2">
            <div class="form-group">
              <label>Religion:</label>
              <select class="form-control ">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Discapacidad:</label>
              <select class="form-control ">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label>Nivel Educativo:</label>
              <select class="form-control ">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Parentezco:</label>
              <select class="form-control ">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Grupo etnico:</label>
              <select class="form-control ">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label>Poblacion Riesgo:</label>
              <select class="form-control ">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group">
              <label>Tipo de aseguradora:</label>
              <select class="form-control ">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="form-group">
              <label>Aseguradora:</label>
              <select class="form-control ">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>


@endsection

@section('script')

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  

  })
</script>

<script src="{{asset("plugins/select2/js/select2.full.min.js")}}"></script>

@endsection