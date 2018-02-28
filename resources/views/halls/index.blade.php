@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col s12">
        {{ link_to_route('admin::halls.create', 'Add Hall', null, ['class' => 'btn green waves-effect waves-light ']) }}
    </div>
</div>
<div class="row">
    <div class="col s12">
        @if($halls->count() == 0)
            <h5><i class="fa fa-check-circle"></i> Nothing to show!</h5>
        @endif
        <ul class="collection with-header z-depth-4 rounded-box">
            <li class="collection-header center-align"><h4>Halls</h4></li>
            @foreach($halls as $halls)
                <li class="collection-item">
                    {{ $halls->hall_name }}
                    <div class="span right">
                        <a href="{{ route('admin::halls.edit', ['id' => $halls->id]) }}"><i class="fa fa-pencil"></i> Edit</a>
                        {!! Form::open(['url' => route('admin::halls.destroy', ['id' => $halls->id]), 'method' => 'DELETE', 'style' => 'display:inline', 'id' => 'frm-delete-halls']) !!}
                            <a class="btn-delete-halls" href="#"><i class="fa fa-trash"></i> Delete</a> 
                        {!! Form::close() !!}
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    $('body').on('click', 'a.btn-delete-halls', function(evt){
        evt.preventDefault();
        $(this).parent('#frm-delete-halls').submit();
    });
</script>

@endsection