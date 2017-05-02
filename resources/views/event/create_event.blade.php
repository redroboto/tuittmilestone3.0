@extends('layout.master')

@section('title','Create Event')

@section('content')

<div class="container-fluid text-center">
	<h3>Start an event today</h3>
	<h4>Subtext</h4>
</div>
<form method="POST">

{{csrf_field()}}

<!-- select location and timestamp for event -->
<div class="container-fluid row">
	<div class="col-xs-3">
		<!-- glyphicon or image here -->
	</div>
	<div class="col-xs-6">
		<h3>Step 1 of 3</h3>
		<h4>Select the location for your event:</h4>
		<select class="form-control" name="city">
			
			@foreach($cities as $key => $city)
			<option value="{{$key}}">{{$city->city}}</option>
			@endforeach

		</select>

		<h4>Choose a start date for your event:</h4>
		<input class="form-control" type="date" name="date">
		
	</div>
</div> 

<!-- select category and set headcount for event -->

<div class="container-fluid row">
	<div class="col-xs-3">
		<!-- glyphicon or image here -->
	</div>
	<div class="col-xs-6">
		<h3>Step 2 of 3</h3>
		<h4>Choose a category for your event:</h4>
		<select class="form-control" name="category">

			@foreach($categories as $key => $category)
			<option value="{{$key}}">{{$category->type}}</option>
			@endforeach

		</select>

		<h4>How many people will you need for your event?</h4>
		<input class="form-control" type='number' name="headcount" min='1' value='1'>
			
	</div>
</div>

<!-- enter event details -->

<div class="container-fluid row">
	<div class="col-xs-3">
		<!-- glyphicon or image here -->
	</div>
	<div class="col-xs-6">
		<h3>Step 3 of 3</h3>

		
			<h4>Assign a name for your event:</h4>
			<input class="form-control" type="text" name="name" placeholder="Enter event name">

			<h4>Enter a description for your event (include the time, meet-up place, agenda, etc.)</h4>
			<textarea class="form-control" type="text" name="description"></textarea>
		
	</div>
</div>

<!-- submit all information -->

<div class="container-fluid text-center">
	<h3>Ready to create your event?</h3>
	
		<input class="btn btn-success" type="submit" name="create" value="Create">
		<a href="{{url('/home/allEvents')}}"><input class="btn btn-warning" type="button" name="cancel" value="Cancel"></a>
	
</div>
</form>

@endsection