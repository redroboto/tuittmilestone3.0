@extends('layout.master')

@section('title','User Page')

@section('content')

<div class="container-fluid text-center">
	<h3>Enter welcome message here</h3>
</div>

TEST
<!-- Select display mode -->
<div class="panel panel-default btn-group-vertical">
	<!-- <div class="btn-group-vertical text-center"> -->
		<button type="button" class="btn btn-primary btn-block">All events</button>
		<button type="button" class="btn btn-primary">My events</button>
		<button type="button" class="btn btn-primary">Manage events created by me</button>
	<!-- </div> -->
</div>



<!-- display events here based on selected mode -->

<div class="container-fluid">
	@foreach($dates as $date)
		{{$date}} <br>
		@foreach($events as $event)
			@if($event->date == $date)
				{{$event->name}} <br>
			@endif
		@endforeach
	@endforeach
</div>

@endsection