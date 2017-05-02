<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    function cities(){
    	return $this->hasOne('App\City','id','city_id');
    }

    function users() {
    	return $this->belongsToMany('App\User','users_events','event_id','user_id');
    }

    function comments() {
    	return $this->hasMany('App\Comment');
    }

    public function my_organizer(){
        return $this->users()->wherePivot('role','organizer')->get();
    }

    public function my_volunteers(){
    	return $this->users()->wherePivot('role','volunteer')->get();
    }

}
