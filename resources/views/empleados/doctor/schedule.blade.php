@extends('themes/layaoutT')

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset("plugins/datepicker/jquery-ui.multidatespicker.css")}}">
<link rel="stylesheet" href="{{asset("plugins/select2/css/select2.css")}}">

@endsection
@section('cont')
<div class="row">
<div class="col-md-8" style="margin: auto">
    <div class="card card-info " >
        <div class="card-header">
          <h3 class="card-title">Crear Horario</h3>
        </div>
        
        <div class="card-body">
        <form action="{{route('doctor.schedule.assignment', $empleado)}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="days_off">Días de descanso</label>
                  <input id="multi_date_input"  name="multi_date_input"  placeholder="Seleccione los dias de descanso" id="days_off" type="text" class="form-control" required>
              </div>
                
                <div class="form-group">
                    <label>Días no laborables</label>
          
                    <select id="week_days_off" name="week_days_off[]"  class="select2" required multiple="multiple" style="width: 100%;" data-placeholder="seleccione dias no laborales">
                    <option value="1">Domingo</option>
                    <option value="2">Lunes</option>
                    <option value="3">Martes</option>
                    <option value="4">Miércoles</option>
                    <option value="5">Jueves</option>
                    <option value="6">Viernes</option>
                    <option value="7">Sábado</option>
                    </select>
                </div>
                
                @foreach($days as $key => $day)
	            <div class="row">
		             <div class="col s2">
			              <p>{{ $day }}</p>
		           </div>
	        	<div class="col s2">
			        <input id="{{ $key }}-turn_a_in" type="time" name="{{ $key }}-turn_a_in" >
			        <label for="{{ $key }}-turn_a_in">Turno A Entrada</label>
		       </div>
		       <div class="col s2">
			       <input id="{{ $key }}-turn_a_out" type="time" name="{{ $key }}-turn_a_out" >
			       <label for="{{ $key }}-turn_a_out">Turno A Salida</label>
		       </div>
		       <div class="col s2">
			      <input id="{{ $key }}-turn_b_in" type="time" name="{{ $key }}-turn_b_in" >
			      <label for="{{ $key }}-turn_b_in">Turno B Entrada</label>
		        </div>
		       <div class="col s2">
			       <input id="{{ $key }}-turn_b_out" type="time" name="{{ $key }}-turn_b_out" >
			       <label for="{{ $key }}-turn_b_out">Turno B Salida</label>
		       </div>
	        </div>
          @endforeach
                
                 
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-info">Guardar</button>
      </div>
      </form>
    </div>
</div>
</div>
@endsection

@section('script')
<script src="{{asset('plugins/jquery-ui/external/jquery/jquery.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('plugins/datepicker/jquery-ui.multidatespicker.js')}}"></script>
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<script>

     $('#multi_date_input').multiDatesPicker({
      dateFormat: 'yy/m/d',
    });
    
    //Initialize Select2 Elements
    $('.select2').select2();

</script>

@endsection