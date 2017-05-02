<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Comment extends Model
{
    function user(){
    	return $this->belongsTo('App\User');
    }
}
