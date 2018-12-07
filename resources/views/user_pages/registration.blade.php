@extends('layouts.user')
@section('content')

<div class="container">
<div class="col s12">
    <p class="flow-text">{{ $registration_count }} results <i class="fa fa-users"></i></p>
</div>
<div class="row">
  <div class="section">
    <h5 class="center">BOOKINGS</h5>
</div>
<div class="divider"></div>
<div class="divider"></div>
<table class="highlight responsive-table bordered centered">
        <thead>
          <tr>
              <th>NAME</th>
              <th>EVENT NAME</th>
              <th>DATE_OF_EVENT</th>
              <th>START_TIME</th>
              <th>END_TIME</th>
              <th>STATUS</th>
          </tr>
        </thead>
        <tbody>
        @foreach($registrations as $registration)
        <tr>
            <td>{{$registration->user->name}}</td>
            <td>{{$registration->event->name}}</td>
            <td>{{$registration->from_date}}
            to {{$registration->to_date}}</td>
            <td>{{$registration->start_time}}</td>
            <td>{{$registration->end_time}}</td>
            <td>{{$registration->status}}</td>
            
        </tr>
        @endforeach
    </tbody>
</table>
@endsection