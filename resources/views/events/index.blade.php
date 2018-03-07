@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col s12">
        {{ link_to_route('admin::events.create', 'Add Event', null, ['class' => 'btn green waves-effect waves-light ']) }}
    </div>
</div>
<div class="row">
    <div class="col s12">
        @if($events->count() == 0)
            <h5><i class="fa fa-check-circle"></i> Nothing to show!</h5>
        @endif
        <ul class="collection with-header z-depth-4 rounded-box">
            <li class="collection-header center-align"><h4>Events</h4></li>
            @foreach($events as $events)
                <li class="collection-item">
                    {{ $events->name }}
                    <div class="span right">
                        <a href="{{ route('admin::events.edit', ['id' => $events->id]) }}"><i class="fa fa-pencil"></i> Edit</a>
                        {!! Form::open(['url' => route('admin::events.destroy', ['id' => $events->id]), 'method' => 'DELETE', 'style' => 'display:inline', 'id' => 'frm-delete-events']) !!}
                            <a class="btn-delete-events" href="#"><i class="fa fa-trash"></i> Delete</a> 
                        {!! Form::close() !!}
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    $('body').on('click', 'a.btn-delete-events', function(evt){
        evt.preventDefault();
        $(this).parent('#frm-delete-events').submit();
    });
</script>

@endsection