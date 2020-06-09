<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script>window.jQuery||document.write('<script src="vendor/jquery/dist/jquery.js"><\/script>')</script>
<script type="text/javascript" src="{{asset('plugins/pickadate/picker.js')}}"></script>
<script  type="text/javascript"  src="{{asset('plugins/pickadate/picker.date.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/pickadate/picker.time.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/pickadate/legacy.js')}}"></script>

<script type="text/javascript">
   ////////
    var input_date = $('.datepicker').pickadate({
          min: true,
          formatSubmit: 'yyyy/mm/dd',
    });
    var date_picker = input_date.pickadate('picker');

   
    var input_time = $('.timepicker').pickatime({
       min: [7,30],
       max:  [18,0],
       formatSubmit: 'H:i',
    });

    var time_picker = input_time.pickatime('picker');

    ////////////
    var speciality = $('#speciality');

       $('#speciality').change(function () {
        
        $.ajax({
            url: "{{route('ajax.user_speciality')}}",
            method: "GET",
            data: {
                speciality:speciality.val(),
            },
            success: function(data){
              $('#doctor').empty();
              $('#doctor').append('<option disabled selected>selecciona un doctor</option>');
              $.each(data, function(index, element){
                $('#doctor').append('<option value"'+element.id+'">'+element.nombres+'</option>');
              });
            }
        });
       });
       ////////
     


 
   
</script>