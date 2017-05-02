@extends('layout.master')
	
@section ('title','Add Article')

@section('content')
<div class="container">
	<form method="POST">
	<!-- add csrf_field to any form in laravel -->
		{{csrf_field()}}
		Title: <input class="form-control" type="text" name="title"><br>
		Content: <br> <textarea class="form-control" name="content"></textarea> <br>
		<input class="btn btn-info" type="submit" name="submit">
	</form>
</div>
@endsection