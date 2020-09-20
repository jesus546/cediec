<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CEDIEC | IPS SALUD</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">
    <script src="{{asset("plugins/jquery/jquery.min.js")}}"></script>
    <link href="{{asset('css/bootstrap.min.css' )}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link href="{{asset('css/dashboard.css' )}}" rel="stylesheet">
    @yield('style')
    
</head>
<body style="font-size: 1.125rem; background-color: rgba(232, 230, 230, 0.645);" >
    <nav class="navbar navbar-dark sticky-top  flex-md-nowrap p-0 shadow" style="background-color:  rgba(0, 135, 238, 0.885);">
        @include('themes/headerT')
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                @include('themes/asideT')
            </nav>
       
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-5" style="top: 15px; margin-bottom: 40px;">
        @include('themes/breadcumbs')

        @yield('cont')
    </main>


    
    </div>
</div>

   
    @yield('script')

<script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("js/sweetalert.min.js")}}"></script>
<script>
    showTime();
function showTime(){
myDate = new Date();
hours = myDate.getHours();
minutes = myDate.getMinutes();
seconds = myDate.getSeconds();
if (hours < 10) hours = 0 + hours;

if (minutes < 10) minutes = "0" + minutes;

if (seconds < 10) seconds = "0" + seconds;

$("#HoraActual").text(hours+ ":" +minutes+ ":" +seconds);
setTimeout("showTime()", 1000);
}

</script>

@include('sweetalert::alert')
</body>
</html>