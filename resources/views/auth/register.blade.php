@extends('layouts.auth')

@section('content')

<div class="row">
        <div class="col offset-m2 m8 s12">
        @include('partials.error')
            <div class="card z-depth-2 rounded-box">
                <div class="card-content">
                    <span class="card-title center-align">
                        <i class="material-icons">perm_identity</i> Register
                    </span>
                    {!! Form::open(['url' => route('auth.register')]) !!}
                            @include('auth.partials.form')
                        {!! Form::close() !!}
                        </div>
            </div>
        </div>
    </div>
@endsection