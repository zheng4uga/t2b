@extends('layouts.dashboard')
@section('page-title','View Shift')
@section('screen')
<div style="background-color: #FFF" class="jumbotron jumbotron-fluid">
    <div class="container text-center">
        <h1>{{$curshift->title}}</h1>
        <span class="badge badge-warning mb-2">{{$curshift->status}}</span>
        <div class="user"><i class="fa fa-user"></i> {{$curshift->requestMember->firstname}} {{$curshift->requestMember->lastname}}</div>
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item">Start Time:</li>
            <li class="list-inline-item"><time class="font-size-4" datetime="{{$curshift->start}}">{{date_format($curshift->start,'F d Y h:m:s a')}}</time></li>       
        </ul>
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item">End Time:</li>
            <li class="list-inline-item"><time class="font-size-4" datetime="{{$curshift->end}}">{{date_format($curshift->end,'F d Y h:m:s a')}}</time></li>       
        </ul>
            <div class="gmap_canvas">
                <iframe width="685" height="378" id="gmap_canvas" src="https://www.google.com/maps/search/{{$curshift->encodedMapAddress}}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    
            </div>
    </div>
</div>
@endsection

@section('section-js')

@endsection



