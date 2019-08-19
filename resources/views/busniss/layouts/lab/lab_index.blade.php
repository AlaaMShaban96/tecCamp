
@extends('busniss.layouts.app')

@section('content')



<div class="card-columns">
    <div class="card">
        <img class="card-img-top" src="{{ url('storage/'.$lab->photo)}}" alt="">
        <div class="card-body">
            <h4 class="card-title">{{$lab->usernmae}}</h4>
        <p class="card-text">{{$lab->descrbtion}}</p>
        <p class="card-text">{{$lab->opning_time}}</p>
        <p class="card-text">{{$lab->closing_time}}</p>
        <p class="card-text">{{$lab->closing_time}}</p>
        <p class="card-text">{{$lab->number}}</p>
        </div>
    </div>
  
@endsection