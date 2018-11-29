@extends('layouts.dashboard')
@section('screen')
    <div id="shiftCalendar"></div>
@endsection
@section('page-title','Dashboard')
@section('section-js')
    <script src="{{url('js/sb-admin.min.js')}}" ></script>
    <script src="{{url('js/fullcalendar.min.js')}}" ></script>
    <script>
        var $calendar = $('#shiftCalendar');
        var eventApiUri = "{{url('api/allshifts')}}";
        var calendarOpts = {
                themeSystem: 'bootstrap4',
                header: {
                  left: 'prev,next',
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
                events: eventApiUri+"?store=" + "{{$storeId}}"
      
            };
        $(document).ready(function(){
            $calendar.fullCalendar(calendarOpts);
            /*
            $('.store-item-dropdown').click(function(){
               var storeId = $(this).data('storeId');
               $calendar.fullCalendar('destroy');
               calendarOpts.events = eventApiUri+"?store="+storeId;
               $calendar.fullCalendar(calendarOpts);
            });
            */
        });
    </script>
@endsection



