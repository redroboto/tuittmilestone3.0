@extends('layout.master')

@section ('title','Display Article')

@section('content')

	<div class="container">
		<p>{{ $article->title }}</p>
		<p>{{ $article->content }}</p>
	
			<a href='{{url("articles/$article->id/edit")}}'><button class="btn btn-warning" name="edit">Edit</button></a>
			<a href='{{url("articles/$article->id/delete")}}'><button  class="btn btn-danger" name="delete">Delete</button></a>
		<form method='POST' action='{{url("articles/$article->id")}}'>
		{{ csrf_field() }}
		Comment: <br>
		<textarea class="form-control" name="content"></textarea><br>
		<input class="btn btn-success" type="submit" name="comment">
	</form>

	<h3>Comments</h3>
		<ul class="list-group">
			@foreach($article->comments as $comment)
				<li class="list-group-item clearfix">
				<div class="col-xs-12">
				<small>
					{{ $comment->user->name }} says:
				</small>
				<small class="pull-right">
					{{ $comment->created_at }}
				</small>
				</div>

				<div class="col-xs-8">
					{{ $comment->content }}
				</div>	
				
				</li>
			@endforeach
		</ul>


	</div>

@endsection