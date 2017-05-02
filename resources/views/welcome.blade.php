@extends('layout.master')

@section('title','Tuitt Milestone 3.0')

@section('content')


       

<div class="container-fluid row">
     <div style="position: absolute; transform: translate(-50%, -50%); left: 50%; top: 50%; text-align: center; color:white;"> 
            <h2>Find your Outreach event today!</h2>
            <h4>Browse through outreach events created by others or make your own</h4>
            <!-- <a href="{{url('register')}}"><button type="button" class="btn btn-success" style="z-index: 9999">Sign-up</button></a> -->
        </div>
<section class="stripe inverted">
<div id="homeVideoWrap">
        
        <video src="https://secure.meetupstatic.com/s/img/457419671895069178/guest_home/video.mp4" autoplay="" loop="" style="width: 100%;"></video>
    
</div>

</section>
    <div class="col-xs-offset-1">
        <h3 style="padding-left:15px;">How it works</h3>
        <div class="container row">
            <div class="col-xs-11">
                <span class="glyphicon glyphicon-heart-empty"></span>
                <h4 style="display:inline-block;">Browse through outreach events</h4>
                <h5>Easily find upcoming outreach events and sign-up with just a click</h5>
            </div>

            <div class="col-xs-11">
                 <span class="glyphicon glyphicon-flag"></span>
                <h4 style="display:inline-block;">Create your own outreach events</h4>
                <h5>Do you have an advocacy but not enough people to support your cause? Create your own event and let people join!</h5>
            </div>
        </div>
    </div>
</div>

<!-- <div class="container-fluid text-center">
    <h3>Get this on mobile</h3>
    <a href="#">Insert appstore image here</a><br>
    <a href="#">Insert google play image here</a>
</div> -->

@endsection

