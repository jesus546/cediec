<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CEDIEC | IPS SALUD</title>
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="{{asset("dist/css/style2.css")}}">
   
    
    @yield('style')
    
</head>
<body>
    <!- header->
    <div class="text-primary">
        @include('layout/header')
    </div>
    
     
    <!-main ->
    <div class="content">
        @yield('cont')
    </div>

    <!- footer->
    <div>
        @include('layout/footer')
    </div>

    @yield('script')

<script src="{{asset("dist/js/headroom.min.js")}}"></script>
<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<script src="{{asset("dist/js/scripts2.js")}}"></script>
</body>
</html>