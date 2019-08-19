
@extends('busniss.layouts.app')

@section('content')



<div class="card-columns">
    <div class="card">
        <img class="card-img-top" src="{{ url('storage/'.$pharmcy->photo)}}" alt="">
        <div class="card-body">
            <h4 class="card-title">{{$pharmcy->usernmae}}</h4>
        <p class="card-text">{{$pharmcy->descrbtion}}</p>
        <p class="card-text">{{$pharmcy->opning_time}}</p>
        <p class="card-text">{{$pharmcy->closing_time}}</p>
        <p class="card-text">{{$pharmcy->closing_time}}</p>
        <p class="card-text">{{$pharmcy->number}}</p>
        </div>
    </div>
  
@endsection