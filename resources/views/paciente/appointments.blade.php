@extends('themes.layaoutT')

@section('cont')
<div class="row ">
    <div class="col-8 " style="margin:auto">
      <div class="card">
        <div class="card-header bg-blue">
          <h3 class="card-title">Citas</h3>
   
        </div>
     
        <!-- /.card-header -->
        <div class="card-body table-responsive  p-0">
          <table class="table table-hover  text-nowrap">
            <thead >
              <tr>
                <th>Id</th>
                <th>especialista</th>
                <th>fecha</th>
                <th>hora</th>
                <th>estado</th>
                
              </tr>
            </thead>
            <tbody>  
              <tr>
                <td scope="row">1</td>
                <td>asd</td>
                <td>ada</td>
                <td>adsa</td>
                <td>ad</td>
              </tr>  
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection