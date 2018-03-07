@extends('layouts.user')
@section('content')
<div class="container">
<div class="row">
  <div class="section">
    <h5 class="center">YOUR BOOKINGS</h5>
</div>
<div class="divider"></div>
<div class="divider"></div>
<table class="highlight responsive-table bordered centered">
        <thead>
          <tr>
              <th>HALL NAME</th>
              <th>DATE_OF_EVENT</th>
              <th>START_TIME</th>
              <th>END_TIME</th>
              <th>STATUS</th>
              <th>REJECt</th>
          </tr>
        </thead>
        <tbody>
        @foreach($registrations as $registration)
        <tr>
            <td>{{$registration->hall->name}}</td>
            <td>{{$registration->date_of_event}}</td>
            <td>{{$registration->start_time}}</td>
            <td>{{$registration->end_time}}</td>
           
            <td>{{$registration->status}}</td>
            <td> 
                {!! Form::open(['url' => route('user_pages.unregister')]) !!}
                    {!! Form::hidden('id', $registration->id) !!}
                    <div class="input-field">
                        {!! Form::submit('Remove', ['class' => "btn red", 'name' => 'submit']) !!}
                    </div>
                        {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection