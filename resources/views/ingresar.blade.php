@extends('layout/layaout')


@section('cont')


<div class="login-group ">
    @csrf
    <form  action="" method="POST">
        <div class="form-group">
            <label class=" col-form-label" for="tipo">Tipo De Identificacion</label>
                <select class="form-control">
                    <option>Large select</option>
                  </select 
        </div>
        <br>
        <div class="form-group">
            <label for="identificacion">Identificacion</label>
            <input type="text" class="form-control" name="identificacion" id="exampleFormControlInput1" >
         </div>
         
        
        <div class="form-group">
            <label for="contaseña">contraseña</label>
            <input type="password" class="form-control" name="contraseña" id="exampleDropdownFormPassword1" >
        </div>
        
        <div class="fbt">
            <button class="btn btn-primary " type="submit">Registrar</button>
            <button class="btn btn-primary" type="submit">Iniciar</button>
        
        </div>
         

    </form>
   </div>
    
@stop
