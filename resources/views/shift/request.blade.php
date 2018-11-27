@extends('layouts.dashboard')
@section('page-title','Shift Request')
@section('screen')
<div class="text-center">
    
    <h1>Shift Request</h1>
    <ol style="list-style-position: inside;font-size: 14px;font-weight: bold;">
        <li>Enter a message you want to display for your shift request</li>
        <li>Enter start time for your request</li>
        <li>Enter end time for your request</li>
    </ol>
</div>
<form id='shiftForm' method="post" action="{{Illuminate\Support\Facades\URL::current()}}">
        @csrf

  <div class="form-group row">
    <label for="message" class="col-sm-2 col-form-label">Message</label>
    <div class="col-sm-10">
        <input name="title" type="text" class="form-control" id="message" placeholder="Enter your message">
    </div>
  </div>
  <div class="form-group row">
    <label for="start" class="col-sm-2 col-form-label">Start</label>
    <div class="col-sm-10">
        <input name="start" type="datetime-local" class="form-control" id="start" placeholder="Enter request start time">
    </div>
  </div>
  <div class="form-group row">
    <label for="end" class="col-sm-2 col-form-label">End</label>
    <div class="col-sm-10">
        <input name="end" type="datetime-local" class="form-control" id="end" placeholder="Enter request end time">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Request</button>
    </div>
  </div>
</form>
@endsection

@section('section-js')
<script>
    $(function(){
        $('#shiftForm').submit(function(e){
            e.preventDefault();
           $data = $(this).serialize();
           $action = $(this).attr('action');
           $.ajax({
               url:$action,
               data:$data,
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



