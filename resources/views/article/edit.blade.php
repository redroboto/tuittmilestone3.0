@extends('layout.master')
	
@section ('title','Edit Article')
@section('content')
<div class="container">
	<form method="POST">
	<!-- add csrf_field to any form in laravel -->
		{{csrf_field()}}
		Title: <input class="form-control" type="text" name="title" value="{{$article_to_be_edited->title}}"><br>
		Content: <br> <textarea class="form-control" name="content">{{$article_to_be_edited->content}}</textarea> <br>
		<input class="btn btn-success" type="submit" name="save">
		<input class="btn btn-warning" type="button" name="cancel" value="cancel" href="{{url('articles')}}">
	</form>
</div>
@endsection