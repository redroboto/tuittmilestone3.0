@extends('layout.master')

@section('title','Display Event')

@section('content')
<div class="container-fluid panel panel-default">
	<div class="container">
		<div class="col-xs-offset-2 col-xs-2">
			<a href='{{url("/home/allEvents")}}'>Back to Events</a>
		</div>
		<div class="col-xs-2">
			<a href="#">Members</a>
		</div>
		<div class="col-xs-2">
			<a href="#">Gallery</a>
		</div>
		<div class="col-xs-2">
			<a href='{{url("events/$event->id/discussion")}}'>Discussion</a>
		</div>
		
		
		
		
	</div>
</div>

<div class="container-fluid">
	<h2>Event Selected: {{$event->name}}</h2>
	<h3>Date: {{$event->date}}</h3>
	<h3>Location of event: {{$city->city}}</h3>
	<h3>Event description:</h3>
	<p>{{$event->description}}</p>
	<a href="#"><button class="btn btn-success">Join Event</button></a>
</div>


@endsection