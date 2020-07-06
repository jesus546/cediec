<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
var fk_departamento = $('#fk_departamento');
var fk_municipio = $('#fk_municipio');

$('#fk_departamento ').change(function () {

$.ajax({
    url: "{{route('ajax.municipio')}}",
    method: "GET",
    data: {
      fk_departamento:fk_departamento.val(),
    },
    success: function(data){
      fk_municipio .empty();
      fk_municipio .append('<option disabled selected>selecciona un doctor</option>');
      $.each(data, function(index, element){
        fk_municipio .append('<option value="'+element.id+'">'+element.nombre+'</option>');
      });
    }
});
});


</script>

