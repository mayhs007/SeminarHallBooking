@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col offset-m2 m8 s12">
        @include('partials.errors')
        <div class="card rounded-box">
            <div class="card-content">
                <div class="card-title center-align">
                    Create Hall
                </div>
                {!! Form::model($hall, ['url' => route('admin::halls.store'), 'files' => true]) !!}
                    @include('halls.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
    
@endsection