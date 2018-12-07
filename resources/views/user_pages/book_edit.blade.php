@extends('layouts.user')

@section('content')

<div class="row">
    <div class="col offset-m2 m8 s12">
        @include('partials.errors')
        <div class="card rounded-box">
            <div class="card-content">
                <div class="card-title center-align">
                BOOK
                </div>
                {!! Form::model($registrations, ['url' => route('user_pages.book')]) !!}
                     @include('user_pages.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
    
@endsection