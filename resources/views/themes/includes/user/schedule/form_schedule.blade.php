
    
    <div class="card-body">
    <form action="{{$route}}" method="POST">
        @csrf
        @if (!isset($appointments))
                <div class="form-group">
                    <label for="speciality">Selecciona la especialidad</label>
                    <select class="form-control dynamic" id="speciality" name="speciality" >
                    
                    <option disabled selected> selecciona una especialidad</option>
                @foreach ($specialities as $speciality)
                    <option value="{{$speciality->id}}">{{$speciality->name}}</option>
                @endforeach
                </select>
                </div>
                <div class="form-group">
                    <label for="doctor">Doctor</label>
                <select class="form-control" id="doctor" name="doctor">
                    <option disabled selected>primero selecciona una especialidad</option>
                    
                    
                </select>
                </div>
        @else
        
        <div class="form-group">
            <label for="status">Estado de la cita</label>
        <select class="form-control" id="status" name="status">
            <option  value="pendiente" disabled @if ($appointments->status=='pendiente' ) selected   @endif>pediente</option>
            <option  value="terminada" @if ($appointments->status=='terminada' )  selected @endif>terminada</option>
            <option  value="cancelada" @if ($appointments->status=='cancelada' ) selected @endif>cancelada</option>
        </select>
        </div>
        @endif
       
                <div class="row " >
                    <div class="col-sm-6">
                    <div class="form-group" >
                        <label for="datepicker">Fecha </label>
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        <input id="datepicker" name="date" class="form-control datepicker " placeholder="selecciones una fecha"  @if (isset($appointments))
                          data-value="{{$appointments->dates->format('Y/m/d')}}" @endif>
                        </div>
                        
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <label for="timepicker">Hora</label>
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-clock"></i> </span>
                        <input name="time" class="form-control timepicker " placeholder="seleccione una hora"
                        @if (isset($appointments))
                         data-value="{{$appointments->dates->format('H:i')}}"
                        @endif>
                        </div>
                        
                    </div>
                    </div>
                </div>

                <input type="hidden" name="user_id" value="{{encrypt($usuario->id)}}">
            
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-info">Agendar</button>
    <button type="submit" class="btn btn-default float-right">Cancel</button>
</div>
</form>
