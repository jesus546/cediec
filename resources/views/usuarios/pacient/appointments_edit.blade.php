@extends('themes.layaoutT')

@section('style')
<link rel="stylesheet" href="{{asset('plugins/pickerdata/themes/default.date.css')}}">
<link rel="stylesheet" href="{{asset('plugins/pickerdata/themes/default.time.css')}}">
<link rel="stylesheet" href="{{asset('plugins/pickerdata/themes/default.css')}}">
@endsection

@section('cont')
<div class="col-md-9" style="margin: auto">
    <div class="card card-info " >
        <div class="card-header">
          <h3 class="card-title">Editar Cita de {{$usuario->nombres}}</h3>

        </div>
        
        <div class="card-body">
            <form action="" method="post">
              @csrf
              <div class="form-group">
                <label>Selecciona la especialidad:</label>
                
             <select class="form-control" id="speciality" name="speciality">
                   <option disabled selected> selecciona una especialidad</option>
               @foreach ($specialities as $speciality)
                 <option value="{{$speciality->id}}">{{$speciality->name}}</option>
               @endforeach
             </select>
           </div>
              <div class="form-group">
                   <label>Doctor</label>
                <select class="form-control" id="doctor" name="doctor">
                  <option disabled selected>primero selecciona una especialidad</option>
                  
                </select>
              </div>
                  <div class="row " >
                    <div class="col-sm-6">
                      <div class="form-group" >
                        <label for="datepicker">Fecha </label>
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                          <input type="text" id="datepicker" name="date" class="form-control datepicker " placeholder="selecciones una fecha">
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                         <label for="timepciker">Hora</label>
                         <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-clock"></i> </span>
                          <input type="text" name="time" class="form-control timepicker " placeholder="seleccione una hora">
                        </div>
                         
                      </div>
                    </div>
                     
                    </div>
                    <input type="hidden" name="user_id" value="{{encrypt($usuario->id)}}">
                 
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-info">Asignar</button>
        <button type="reset" class="btn btn-default float-right">Cancel</button>
      </div>
      </form>
    </div>
</div>

   
@endsection

@section('script')

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script>window.jQuery||document.write('<script src="vendor/jquery/dist/jquery.js"><\/script>')</script>
<script type="text/javascript" src="{{asset('plugins/pickadate/picker.js')}}"></script>
<script  type="text/javascript"  src="{{asset('plugins/pickadate/picker.date.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/pickadate/picker.time.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/pickadate/legacy.js')}}"></script>
<script>
    var input_date = $('.datepicker').pickadate({
          min: true
    });
    var date_picker = input_date.pickadate('picker')

   
    var input_time = $('.timepicker').pickatime({
         min: 2
    });

    var time_picker = input_time.pickatime('picker')

    $(document).ready(function () {
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

  });
  
</script>
@endsection