<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>@yield('title')</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" media="screen"
     href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<!-- insert header here -->
<div class="container-fluid row">
	@if(!Auth::user())
	<div class="col-xs-2 col-xs-offset-2"><h4>Outreach.com</h4></div>

	<div class="col-xs-2"><a href="{{url('/')}}"><h4>Welcome Page</h4></a></div>

	<div class="col-xs-4 col-xs-offset-2">
		
		<a href="{{url('login')}}"><button class="btn btn-default">Log In</button></a>
		<a href="{{url('register')}}"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#signUp">Sign-up</button></a>
	</div>
		
	</div>
	@else
		<div class="col-xs-3">Outreach.com</div>
		<div class="col-xs-3"><a href="{{url('/home/allEvents')}}">Home</a></div>
		<div class="col-xs-3"><a href="{{url('events/create')}}">Create an Event</a></div>
		<div class="col-xs-3">
			<div class="dropdown">
				<div class="dropdown-toggle" data-toggle="dropdown">Welcome, {{Auth::user()->first_name}}<span class="caret"></span>
				</div>
				<ul class="dropdown-menu" role="menu">
					<li>
					    <a href="{{ route('logout') }}"
					        onclick="event.preventDefault();
					                 document.getElementById('logout-form').submit();">
					        Logout
					    </a>

					    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					        {{ csrf_field() }}
					    </form>
					</li>
					<li>
						<a href="{{url('/home/allEvents')}}">Back to Home</a>
					</li>
				</ul>
			</div>
		</div>
	@endif
</div>
<hr>

@if(Session::has('message'))
	<p class="alert {{Session::get('alert-class','alert-info') }}">
		{{Session::get('message')}}
	</p>
@endif

@yield('content')

<!-- insert footer here -->

<hr>

@if(!Auth::user())
<div class="container-fluid row" >
<div class="col-xs-offset-1" style="padding-left: 15px;">
	<!-- <a href="{{url('events/create')}}"> --><h3>Log in to join or create your own outreach events!</h3><!-- </a> -->
	<a href="{{url('login')}}"><button class="btn btn-primary">Log In</button></a>
<hr>
	<!-- <div class="container">
		<a href="#">Link</a>
		<a href="#">Link</a>
		<a href="#">Link</a>
		<a href="#">Link</a>
		<a href="#">Link</a>
		<a href="#">Link</a>
		<a href="#">Link</a>
		<a href="#">Link</a>
		<a href="#">Link</a>
	</div> -->
@endif

	2017 Tuitt Capstone Project 3 | By <a href="#">Vincent Pleyto</a>
</div>
</div>


</body>
</html>