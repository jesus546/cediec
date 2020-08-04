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
            @can('editar factura paciente')
            @if (isset($usuario))
            <a class="btn btn-info btn-sm" href="{{route('back.invoice.edit', [$usuario, $invoice])}}" ><i class="fas fa-pencil-alt"></i> </a>
            @endif
            @endcan
            @role('User')
            <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">
              <input name="merchantId"    type="hidden"  value="508029"   >
              <input name="accountId"     type="hidden"  value="512321" >
              <input name="description"   type="hidden"  value="Test PAYU"  >
              <input name="referenceCode" type="hidden"  value="TestPayU" >
              <input name="amount"        type="hidden"  value="20000"   >
              <input name="tax"           type="hidden"  value="3193"  >
              <input name="taxReturnBase" type="hidden"  value="16806" >
              <input name="currency"      type="hidden"  value="COP" >
              <input name="signature"     type="hidden"  value="7ee7cf808ce6a39b17481c54f2c57acc"  >
              <input name="test"          type="hidden"  value="1" >
              <input name="buyerEmail"    type="hidden"  value="test@test.com" >
              <input name="responseUrl"    type="hidden"  value="http://www.test.com/response" >
              <input name="confirmationUrl"    type="hidden"  value="http://www.test.com/confirmation" >
              <input name="Submit"        type="submit"  value="Enviar" >
            </form>
            @endrole
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