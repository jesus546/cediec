@extends('themes.layaoutT')

@section('cont')

  <div class="col-md-9" style="margin: auto">
    <div class="card card-info " >
        <div class="card-header">
            
        <h3 class="card-title">Editar factura a {{$usuario->nombres}}</h3>
        
        </div>
       
    <div class="card-body">
    <form action="{{route('back.invoice.update', [$usuario, $invoice])}}" method="POST">
            @csrf
         
            <div class="form-group">
                <label for="cantidad">Monto</label>
                <input type="text" class="form-control" name="cantidad" value="{{$invoice->cantidad}}">
              </div>

            
            <div class="form-group">
                <label for="status">Estado de la factura</label>
            <select class="form-control" id="status" name="status">
                <option  value="pendiente" @if ($invoice->status=='pendiente' ) selected   @endif>pediente</option>
                <option  value="aprobado" @if ($invoice->status=='aprobado' )  selected @endif>aprobado</option>
                <option  value="rechazado" @if ($invoice->status=='rechazado' ) selected @endif>rechazado</option>
                <option  value="cancelada" @if ($invoice->status=='cancelada' ) selected   @endif>cancelada</option>
                <option  value="refunded" @if ($invoice->status=='refunded' )  selected @endif>refunded</option>

            </select>
            </div>
          
    
                
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-info">Editar</button>
       <a class="btn btn-default float-right" type="submit"  href="{{route('back.invoice', $usuario)}}">cancelar</a>
    </div>
    </form>
    
  </div>
  </div>
  
     
   
@endsection