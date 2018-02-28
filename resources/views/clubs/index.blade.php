@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col s12">
        {{ link_to_route('admin::clubs.create', 'Add Club', null, ['class' => 'btn green waves-effect waves-light ']) }}
    </div>
</div>
<div class="row">
    <div class="col s12">
        @if($clubs->count() == 0)
            <h5><i class="fa fa-check-circle"></i> Nothing to show!</h5>
        @endif
        <ul class="collection with-header z-depth-4 rounded-box">
            <li class="collection-header center-align"><h4>Clubs</h4></li>
            @foreach($clubs as $clubs)
                <li class="collection-item">
                    {{ $clubs->club_name }}
                    <div class="span right">
                        <a href="{{ route('admin::clubs.edit', ['id' => $clubs->id]) }}"><i class="fa fa-pencil"></i> Edit</a>
                        {!! Form::open(['url' => route('admin::clubs.destroy', ['id' => $clubs->id]), 'method' => 'DELETE', 'style' => 'display:inline', 'id' => 'frm-delete-clubs']) !!}
                            <a class="btn-delete-clubs" href="#"><i class="fa fa-trash"></i> Delete</a> 
                        {!! Form::close() !!}
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    $('body').on('click', 'a.btn-delete-clubs', function(evt){
        evt.preventDefault();
        $(this).parent('#frm-delete-clubs').submit();
    });
</script>

@endsection