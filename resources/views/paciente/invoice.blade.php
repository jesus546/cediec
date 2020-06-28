@extends('themes.layaoutT')

@section('cont')
<div class="row ">
    <div class="col-8 " style="margin:auto">
      <div class="card">
        <div class="card-header bg-blue">
         
          <h3 class="card-title">Facturas </h3>
   
        </div>
     
        <div class="card-body table-responsive  p-0">
          @include('themes.includes.user.invoice.invoice_table')

      </div>
      <!-- /.card -->
    </div>
  </div>

   
@endsection