@extends('layout.master')

@section('title','Event Discussion')

@section('content')

<h2>Discussion Page for {{$event->name}}</h2>

@foreach($event->comments as $comment)
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-body">
				{{$comment->content}}
			</div>
			<div class="panel-footer">
				<div>
				posted by: {{$comment->user->first_name}} {{$comment->user->last_name}} at {{$comment->created_at}}
				</div>

				@if(Auth::user()->id == $comment->user_id)

				<button class="btn btn-warning" data-toggle="modal" data-target="#editComment{{$comment->id}}">Edit</button>

				<div id="editComment{{$comment->id}}" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<form method="POST" action='{{url("events/$comment->id/discussion/editComment")}}'>
								 {{csrf_field()}}
								<div class="modal-body">
						
										<textarea class="form-control" type="text" name="newComment" placeholder="{{$comment->content}}" required></textarea>
									
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-success">Save</button>


									<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								</div>

							</form>
						</div>
					</div>
				</div>

				<a href='{{url("/events/$comment->id/discussion/deleteComment")}}'><button class="btn btn-danger">Delete</button>
				</a>
				@endif
			</div>
		</div>
	</div>
@endforeach 

<div class="container-fluid">
	<form method="POST" action='{{url("/events/discussion/comment/$event->id")}}'>

	{{csrf_field()}}

		Add Comment:
		<textarea class="form-control" type="text" name="content" placeholder="Enter comment here" required></textarea>
		<button class="btn btn-success">Add Comment</button>
	</form>
</div>
@endsection