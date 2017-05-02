@extends('layout.master')
	
@section ('title','Articles')

@section('content')
<h4>Display All articles</h4>
	@foreach($articles as $key => $article)
		@if ($key < 10) 
			<p><a href='{{url("articles/$article->id")}}'>{{$article->title}}</a></p>
			<p>{{ $article->content }}</p>
		@endif
	@endforeach
	<a href="{{url('articles/create')}}"><button class="btn btn-primary">Add Article</button></a>
@endsection