<table class="table table-hover  text-nowrap">
    <thead >
      <tr>
        <th>Id</th>
        <th>Concepto</th>
        <th>Doctor</th>
        <th>Monto</th>
        <th>Estado</th>
        <th>acciones</th>

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
            <td>
            @if (isset($usuario))
            <a class="btn btn-info btn-sm" href="{{route('back.invoice.edit', [$usuario, $invoice])}}" ><i class="fas fa-pencil-alt"></i> </a>
            @endif
            </td>
           
       
           
          </tr>
      @empty
          <tr>
            <td colspan="5">No hay facturas registradas</td>
          </tr>
      @endforelse
   </tbody>
  </table>
</div>