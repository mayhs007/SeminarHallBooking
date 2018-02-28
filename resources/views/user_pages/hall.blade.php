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
        <img src="{{ $hall->getImageUrl() }}" alt="{{ $hall->hall_name }} image" class="activator">
    </div>
    <div class="card-content">
        <span class="card-title activator">
            {{ $hall->hall_name }}
            <i class="material-icons right activator">more_vert</i>            
        </span>
        <a href="{{route('user_pages.book', ['hall_id' => $hall->id])}}">BOOK</a>
    </div>
    <div class="card-reveal">   
    <span class="card-title">
            <i class="material-icons right">close</i>                    
            {{ $hall->hall_name }} 
        </span>
    </div>
</div>
</div>
</div>
@endforeach


@endsection