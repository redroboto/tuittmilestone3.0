@extends('layout.master')

@section('title','User Page')

@section('content')

<div class="container-fluid text-center">
    <h3>Change starts with you. Join an upcoming event or create your own!</h3>
</div>

<!-- Select display mode -->
<div class="btn-group-vertical">
        <a href="{{url('home/allEvents')}}"><button type="button" class="btn btn-default btn-block">All events</button></a>
        <a href="{{url('home/myEvents')}}"><button type="button" class="btn btn-default btn-block">My events</button></a>
         <a href="{{url('home/manageEvents')}}"><button type="button" class="btn btn-default btn-block">Manage events created by me</button></a>
</div>
<hr>



<!-- display events here based on selected mode -->

<div class="container-fluid">
    @if(count($dates))
        @foreach($dates as $date)
        <div class="panel panel-default">
        <div class="panel-body">
            <strong>{{$date}}</strong> <br>
            @foreach($events as $event)
                @if($event->date == $date)
                    <div>
                    Event Name: {{$event->name}} <br>
                    Location: {{$event->cities->city}}<br>
                    @if(count($event->my_organizer()) && Auth::user()->id == $event->my_organizer()[0]->id)
                    <a href='{{url("events/$event->id/delete")}}'><button class="btn btn-danger">Delete</button></a>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#editEvent">Edit</button>

                    <div id="editEvent" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                     <h3>Edit Event Details</h3>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action='{{url("events/$event->id/edit")}}'>

                                    {{csrf_field()}}

                                        <h4>Location:</h4>
                                        <select class="form-control" name="city">

                                        @foreach($cities as $key => $city)
                                        <option value="{{$key}}">{{$city->city}}</option>
                                        @endforeach

                                        </select>

                                        <h4>Start Date:</h4>
                                        <input class="form-control" type="date" name="date">
                                        <h4>Category:</h4>
                                        <select class="form-control" name="category">

                                        @foreach($categories as $key => $category)
                                        <option value="{{$key}}">{{$category->type}}</option>
                                        @endforeach

                                        </select>
                                        <h4>Headcount:</h4>
                                        <input class="form-control" type='number' name="headcount" min='1' value='1'>
                                        <h4>Event Name:</h4>
                                        <input class="form-control" type="text" name="name" placeholder="{{$event->name}}">
                                        <h4>Event Description:</h4>
                                        <textarea class="form-control" type="text" name="description" placeholder="{{$event->description}}"></textarea>

                                        <input class="btn btn-success" type="submit" name="edit" value="Save Changes">

                                    </form>
                                </div>
                                <div class="modal-footer">
                                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    @elseif(count($event->my_volunteers()) && $event->my_volunteers()->contains('id',Auth::user()->id))
                    <a href='{{url("events/leave/$event->id")}}'><button class="btn btn-warning">Leave Event</button></a>

                    @else
                    <a href='{{url("events/$event->id/join")}}'><button class="btn btn-success" name="join">Join</button></a>
                    
                    @endif
                    <a href='{{url("event/displayEvent/$event->id")}}'>
                        <button class="btn btn-info">View Event Details</button>
                    </a>
                    </div>
                @endif
            @endforeach
        </div>
        </div>
        @endforeach
    @else
        <p>No events found.</p>
    @endif
</div>

@endsection
