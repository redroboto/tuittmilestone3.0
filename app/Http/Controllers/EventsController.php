<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Category;
use App\Event;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class EventsController extends Controller
{
    function displayWelcome(){

        $events = Event::all();
        foreach ($events as $event) {
            $date[] = $event->date;
        }
        $dates = array_unique($date);

        return view('welcome',compact('events','dates'));
    }

    function createEvent(){
 
    	$cities = City::all();
    	$categories = Category::all();

    	return view('event.create_event', compact('cities','categories'));
    }

    function saveEvent(Request $request){

    	$new_event = new Event();

    	$new_event->name = $request->name;
    	$new_event->description = $request->description;
    	$new_event->headcount = $request->headcount;
    	$new_event->date = $request->date;
    	$new_event->city_id = $request->city + 1;
    	$new_event->category_id = $request->category + 1;

    	$new_event->save();

    	Auth::user()->new_pivot_event($new_event->id);

    Session::flash('message','Event Successfully Created!');

    return redirect('home/allEvents');

    }

    function joinEvent($id) {

    	Auth::user()->join_event($id);

    Session::flash('message','Event Successfully Joined!');

    return redirect('home/allEvents');

    }

    function leaveEvent($id) {

    	Auth::user()->leave_event($id);

     Session::flash('message','Successfully Left Event!');

    return redirect('home/myEvents');
    }

    function editEvent(Request $request, $id) {

    	$edited_event = Event::find($id);

    	$edited_event->name = $request->name;
    	$edited_event->description = $request->description;
    	$edited_event->headcount = $request->headcount;
    	$edited_event->date = $request->date;
    	$edited_event->city_id = $request->city + 1;
    	$edited_event->category_id = $request->category + 1;

    	$edited_event-> save();

    	Session::flash('message','Event Successfully Edited!');

    	return redirect('home/manageEvents');



    }

    function deleteEvent($id){

    	$event_for_deletion = Event::find($id);
    	$event_for_deletion->delete();

    	Session::flash('message','Event successfully deleted!');

    	return redirect('/home/manageEvents');
    }

    function userEvents(){
    	$categories = Category::all();
     	$cities = City::all();
    	$events = Event::orderBy('date', 'ASC')->get();
    	foreach ($events as $event) {
    		$date[] = $event->date;
    	}
    	$dates = array_unique($date);
    	return view('home', compact('events','dates','cities','categories'));
    }

    function displayAllEvents(){

    	$events = Event::all()->diff(Auth::user()->events_joined())->diff(Auth::user()->my_organized_events())->sortBy('date');
    	foreach ($events as $event) {
    		$date[] = $event->date;
    	}
    	$dates = array_unique($date);
    	return view('home', compact('events','dates'));

    }

     function displayMyEvents(){

    	$events = Auth::user()->events_joined()->sortByDesc('date');
    	$date = array();
    	foreach ($events as $event) {
    		$date[] = $event->date;
    	}
    	if(null!==$date)
    		$dates = array_unique($date);
    	return view('home', compact('events','dates'));

    }

     function displayManageEvents(){

     	// dd(Auth::user()->my_organized_events());
     	$categories = Category::all();
     	$cities = City::all();
    	$events = Auth::user()->my_organized_events()->sortByDesc('date');
    	$date = array();
    	foreach ($events as $event) {
    		$date[] = $event->date;
    	}
    	if(null!==$date)
	    	$dates = array_unique($date);
    	return view('home', compact('events','dates','categories','cities'));

    }

    function displayEvent($id) {

    	$event = Event::find($id);
    	$city = City::find($id);

    	return view('event/display_event',compact('event','city'));
    }

    function eventDiscussion($id) {

    	$event = Event::find($id);
    	$comments = Comment::find($id);

    	return view('event/discussion',compact('event','comments'));
    }

    function addComment(Request $request,$id) {

    	$new_comment = new Comment();

    	$new_comment->content = $request->content;
    	$new_comment->user_id = Auth::user()->id;
    	$new_comment->event_id = $id;

    	$new_comment -> save();

    	Session::flash('message','Comment Posted!');

    	return redirect("/events/$id/discussion");
    }

    function editComment(Request $request,$id){

        $edited_comment = Comment::find($id);

        $edited_comment->content = $request->newComment;

        $edited_comment->save();

        Session::flash('message','Comment Edited!');

        return back();
    }

    function deleteComment($id){

        $comment_for_deletion = Comment::find($id);

        $comment_for_deletion->delete();

        Session::flash('message','Comment Deleted!');

        return back();
    }

}
