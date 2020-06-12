@extends('themes.layaoutT')

@section('style')
@include('themes.includes.user.schedule.header_schedule')
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

@include('themes.includes.user.schedule.foot_schedule')

@endsection