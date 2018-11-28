@extends('layouts.dashboard')
@section('page-title','View Shift')
@section('screen')
<div style="background-color: #FFF" class="jumbotron jumbotron-fluid">
    <div class="container text-center">
        <h1>{{$curshift->title}}</h1>
        <span class="badge mb-2 {{$curshift->status=='ASSIGNED'?'badge-success':'badge-warning'}}">{{$curshift->status}}</span>
        <div class="user"><i class="fa fa-user"></i> {{$curshift->requestMember->firstname}} {{$curshift->requestMember->lastname}}</div>
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item">Start Time:</li>
            <li class="list-inline-item"><time class="font-size-4" datetime="{{$curshift->start}}">{{date_format($curshift->start,'F d Y h:m:s a')}}</time></li>       
        </ul>
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item">End Time:</li>
            <li class="list-inline-item"><time class="font-size-4" datetime="{{$curshift->end}}">{{date_format($curshift->end,'F d Y h:m:s a')}}</time></li>       
        </ul>
        @if($curshift->status =='PENDING')
        <button data-req-id="{{$curshift->id}}" class="btn btn-success" id="pickup-shift">Pick Up Shift</button>
        @endif
            <div class="mt-3 embed-responsive embed-responsive-21by9 gmap_canvas">
                <iframe class="embed-responsive-item" id="gmap_canvas" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBRbfWYPJHEHxHHFPKkYtOolq5Y8WDOU9E&q={{$curshift->encodedMapAddress}}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
    </div>
</div>
@endsection

@section('section-js')
    <script>
        $(function(){
           $('#pickup-shift').click(function(){
               var id = $(this).data('reqId');
              $.ajax({
                  url:"{{url('/shift/pickup')}}",
                  data:{'id':id,"_token": "{{ csrf_token() }}"},
                  method:'post'
              }).done(function(data,status){
              if (status==='success' && 
                      typeof data !== undefined){
                  $.notify({
                      title:data.status.charAt(0).toUpperCase()+data.status.slice(1),
                      message:data.message
                  },{
                      type:(data.status==='success'?data.status:'danger')
                          });
              }
           });
           }); 
        });
    </script>
@endsection



