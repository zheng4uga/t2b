@extends('layouts.dashboard')
@section('page-title','Community Board')
@section('screen')
    <div class="container">
            @foreach($boards as $board)
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    @if($board->boardImage !=NULL)
                        <img class="card-img-right flex-auto d-md-block img-fluid img-responsive mx-auto" 
                             data-src="{{ url('super/public/uploads/' . $board->boardImage['filename']) }}" 
                             alt="{{$board->title}}" src="{{ url('super/public/uploads/_/originals/' . $board->boardImage['filename']) }}" 
                        data-holder-rendered="true" 
                        style="width:250px;height:250px;" >
                    @endif
                    <div class="card-body d-flex flex-column align-items-start">
                      <h3 class="mb-0">
                        <a class="text-dark" href="{{ url('community/'. $board->id) }}">{{$board->title}}</a>
                      </h3>
                        <div class="mb-1 text-muted">{{date('M d, Y',strtotime($board->created_at))}}</div>
                      <article class="card-text mb-auto" style="max-height: none;">{!! $board->description !!}</article>
                      <a href="{{ url('community/'. $board->id) }}">Continue reading</a>
                    </div>
                </div>
            @endforeach
    </div>
@endsection



