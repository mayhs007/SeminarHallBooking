@extends('layouts.admin')
@section('content')
<div class="row">
        <div class="col s12">
            <h4 class="center-align">Reports</h4>
        </div>
    </div>
    <div class="row">
        {!! Form::open(['url' => route('admin::admin_pages.registrations'), 'method' => 'GET']) !!}
            <div class="col s4">
                <label>Hall</label>
            </div>
            <div class="col s4">
                <label>Start_Date</label>                       
            </div>
            <div class="col s4">
                <label>End_date</label>                       
            </div>    
            <div class="col s4">
                {!! Form::select('hall_id', $halls) !!}
            </div>
            <div class="col s4">
            {!! Form::text('start_date','',array('class'=>'datepicker')) !!}                                              
            </div>
            <div class="col s4">
            {!! Form::text('to_date','',array('class'=>'datepicker')) !!}                                              
            </div>
            <div class="col s4">
            {!! Form::submit('View Report',  ['class' => 'btn waves-effect waves-light green', 'name' => 'report_type']) !!}       
            </div>
            <div class="col s4">
            {!! Form::submit('Download Excel', ['class' => 'btn waves-effect waves-light green', 'name' => 'report_type']) !!}
            </div>
            <div class="col s4">
            {!! Form::close() !!}   
            </div>
     </div>
@endsection