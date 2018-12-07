@extends('layouts.user')
@section('content')
@foreach($halls as $hall)
<div class="row">
<div class="col m4">
<div class="container">
<div class="card hoverable">
    <div class="progress hide" id="hall-{{ $hall->id }}-progress">
        <div class="indeterminate"></div>
    </div>
    <div class="card-image waves-effect waves-light waves-block">
    <img src="{{ url($hall->getImageUrl()) }}" alt="{{ $hall->name }}" class="activator">
</div>
    <div class="card-content">
        <span class="card-title activator">
            {{ $hall->name }}
            
            <i class="material-icons right activator">more_vert</i>            
        </span>
        <a href="{{route('user_pages.book', ['hall_id' => $hall->id])}}">BOOK</a>
       
    </div>
    <div class="card-reveal">   
    <span class="card-title">
            <i class="material-icons right">close</i>                    
            {{ $hall->name }}
    </span>
            <ul>
                <li>Capacity:{{$hall->capacity}}</li>
                <li>Location:{{$hall->location}}</li>
                @if($hall->ac)
                <li>Ac:Available Count:{{$hall->ac_count}}</li>
                @endif
                @if($hall->podium_mike)
                <li>Podium_Mike:Available Count:{{$hall->podium_mike_count}}</li>
                @endif
                @if($hall->cordless_hand_mike)
                <li>Cordless_Hand_Mike:Available Count:{{$hall->cordless_hand_mike_count}}</li>
                @endif
                @if($hall->cordless_collar_mike)
                <li>Cordless_Collar_Mike:Available Count: {{$hall->cordless_collar_mike_count}}</li>
                @endif
                @if($hall->video_projector)
                <li>video_projector:Available Count:{{$hall->video_projector_count}}</li>
                @endif
            </ul> 
            {!! Form::open(['url' => route('user_pages.registration')]) !!}
            {!! Form::hidden('id', $hall->id) !!}
            {!! Form::submit('Details', ['class' => "btn small green", 'name' => 'submit']) !!}
            {!! Form::close() !!}
        </span>
    </div>
</div>
</div>
</div>
@endforeach


@endsection