<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CEDIEC | IPS SALUD</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/style2.css')}}">
    
    @yield('style')
    
</head>
<body  class="body">
    <!-- header-->
    <nav class="navbar fixed-top navbar-expand-lg bg-white  border border-light fixed-top text-blue">
        @include('layout/header')
    </nav>
    
     
    <!--main -->
    <main class="content"> 
        @yield('cont')
    <main>

    <!-- footer-->
   <footer class="py-5 bg-dark sticky-footer">
    @include('layout/footer')
   </footer>
    
    @yield('script')

<script src="{{asset("plugins/jquery/jquery.min.js")}}"></script>
<script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

<!-- footer-->
</body>
</html>