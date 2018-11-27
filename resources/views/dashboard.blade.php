@extends('layouts.dashboard')
@section('screen')
    <div id="shiftCalendar"></div>
@endsection
@section('page-title','Dashboard')
@section('section-js')
    <script src="{{url('js/sb-admin.min.js')}}" ></script>
    <script src="{{url('js/fullcalendar.min.js')}}" ></script>
    <script>
        $(document).ready(function(){
            $('#shiftCalendar').fullCalendar({
                themeSystem: 'bootstrap4',
                header: {
                  left: 'prev,next today',
                  center: 'title',
                  right: 'month,agendaWeek'
                },
                eventClick:function(info){
                    window.location.href=info.event.url;
                },
                eventRender: function(eventObj, $el) {
                    $el.popover({
                      title: eventObj.title,
                      trigger: 'hover',
                      placement: 'top',
                      container: 'body'
                    });
                },
                defaultView: $(window).width() < 765 ? 'listDay':'month',
                eventLimit: true, // allow "more" link when too many events
                events: "{{url('api/allshifts')}}"
      
            });
        });
    </script>
@endsection



