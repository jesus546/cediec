@extends('themes.layaoutT')

@section('cont')
<div class="row ">
    <div class="col-8 " style="margin:auto">
      <div class="card">
        <div class="card-header bg-blue">
         
          <h3 class="card-title">facturas</h3>
   
        </div>
     
        <div class="card-body table-responsive  p-0">
            <table class="table table-hover  text-nowrap">
              <thead >
                <tr>
                  <th>Id</th>
                  <th>Concepto</th>
                  <th>Doctor</th>
                  <th>Monto</th>
                  <th>Estado</th>

                </tr>
              </thead>
              <tbody>  
                @forelse ($invoices as $key => $invoice)
                    <tr>
                      <td>{{$invoice->id}}</td>
                      <td>{{$invoice->concept()}}</td> 
                      <td>{{$invoice->doctor()->nombres}}</td>
                      <td>{{$invoice->cantidad}}</td>
                      <td>{{$invoice->status}}</td>
                 
                     
                    </tr>
                @empty
                    <tr>
                      <td colspan="5">No hayfacturas registradas</td>
                    </tr>
                @endforelse
             </tbody>
            </table>
          </div>

      </div>
      <!-- /.card -->
    </div>
  </div>

   
@endsection