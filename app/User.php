<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Event;

class User extends Authenticatable
{

    public function events(){
        return $this->belongsToMany('App\Event','users_events','user_id','event_id');
    }

    public function new_pivot_event($event_id){
        return $this->events()->attach([$event_id => ['role'=>'organizer']]);
    }

    public function join_event($event_id){
        return $this->events()->attach([$event_id => ['role'=>'volunteer']]);
    }

    public function leave_event($event_id){
        return $this->events()->detach($event_id);
    }


    public function my_organized_events(){
        return $this->events()->wherePivot('role','organizer')->get();
    }

    public function events_joined(){
        return $this->events()->wherePivot('role','volunteer')->get();
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','location','contact'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
