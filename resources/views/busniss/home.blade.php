{{-- @extends('busniss.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Busniss :: Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('busniss.layouts.app')

@section('content')

<div class="card">
{{-- <img class="card-img-top" src="{{url('storage/'.$pharmcy->photo)}}" alt=""> --}}
    <div class="card-body">
    <h4 class="card-title">{{Auth::guard('busniss')->user()->name}}</h4>
    <h4 class="card-title">{{Auth::guard('busniss')->user()->t}}</h4>
        {{-- <p class="card-text">{{$pharmcy->descrbtion}}</p>
        <p class="card-text">{{$pharmcy->opning_time}}</p>
        <p class="card-text">{{$pharmcy->closing_time}}</p>
        <p class="card-text">{{$pharmcy->closing_time}}</p>
        <p class="card-text">{{$pharmcy->number}}</p> --}}
    </div>
</div>
@endsection