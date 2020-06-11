
    
    <div class="card-body">
    <form action="{{$route}}" method="post">
        @csrf
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
                    <label for="timepicker">Hora</label>
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
    <button type="submit" class="btn btn-info">Agendar</button>
    <button type="submit" class="btn btn-default float-right">Cancel</button>
</div>
</form>
