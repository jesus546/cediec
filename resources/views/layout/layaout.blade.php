<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CEDIEC | IPS SALUD</title>
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/style2.css')}}">
    
    @yield('style')
    
</head>
<body >
    <!-- header-->
    <div >
        @include('layout/header')
    </div>
    
     
    <!--main -->
    <div  >
        @yield('cont')
    </div>

    <!-- footer-->
   
    @include('layout/footer')
    

    @yield('script')

<script src="{{asset("jquery/jquery.min.js")}}"></script>
<script src="{{asset("js/bootstrap.bundle.min.js")}}"></script>
</body>
</html>