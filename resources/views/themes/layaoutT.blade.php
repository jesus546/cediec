<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CEDIEC | IPS SALUD</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset("plugins/fontawesome-free/css/all.min.css")}}">
    <link rel="stylesheet" href="{{asset("dist/css/adminlte.min.css")}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('style')
    
</head>
<body class="hold-transition sidebar-mini ">
  <div class="wrapper">
        <!-- header-->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        @include('themes/headerT')
        </nav>
        <!--aside-->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" >
        @include('themes/asideT')
        </aside>
    <!--main-->
    <div class="content-wrapper">
        <section class="content-header">
            
        </section>
        <section class="content">
            <div class="container-fluid">
                
                    @yield('cont')
               
                
            </div>
           
        </section>
        
       
    </div>
     <!-- footer-->
     <footer class="main-footer">
        @include('themes/footerT')
     </footer>
    

    </div>

   
    @yield('script')
<script src="{{asset("plugins/jquery/jquery.min.js")}}"></script>
<script src="{{asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js")}}"></script>
<script src="{{asset("dist/js/adminlte.js")}}"></script>
<script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("js/sweetalert.min.js")}}"></script>


@include('sweetalert::alert')
</body>
</html>