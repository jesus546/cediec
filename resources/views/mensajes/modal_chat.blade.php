@extends('themes/layaoutT')
@section('style')
<link rel="stylesheet" href="{{asset("plugins/toastr/toastr.min.css")}}">
@livewireStyles
@livewireScripts
@endsection

@section('cont')
@livewire('counter')
@endsection
  
@section('script')
<script src="{{asset("plugins/toastr/toastr.min.js")}}"></script>
<script>

window.livewire.on('enviarMensajes', function() {
$('.enviar').click(function() {
      toastr.success('Mensaje enviado')
    });
});
</script>
@endsection
  
