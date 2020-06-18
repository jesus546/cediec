@extends('themes/layaoutT')
@section('style')
<link href="{{asset('plugins/fullcalendar/packages/core/main.css')}}" rel='stylesheet'>
<link href="{{asset('plugins/fullcalendar/packages/daygrid/main.css')}}" rel='stylesheet' />
<link href="{{asset('plugins/fullcalendar/packages/timegrid/main.css')}}" rel='stylesheet' />


<style>
   #calendar {
    max-width: 900px;
    margin: 0 auto;
    padding: 2em;
    
  }
</style>
@endsection
@section('cont')
<div class="col-md-10" style="margin: auto">
   
    <div id='calendar'></div>
   </div>
    

@endsection

@section('script')
<script src="{{asset('plugins/fullcalendar/packages/core/main.js')}}"></script>
<script src="{{asset('plugins/fullcalendar/packages/interaction/main.js')}}"></script>
<script src="{{asset('plugins/fullcalendar/packages/daygrid/main.js')}}"></script>
<script src="{{asset('plugins/fullcalendar/packages/timegrid/main.js')}}"></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid'],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: true,
      events: {!! $appointments !!}
    });

    calendar.render();
  });

</script>
@endsection