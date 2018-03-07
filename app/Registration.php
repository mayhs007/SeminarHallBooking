<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use App\Hall;

class Registration extends Model
{
    //
    function event()
    {
        return $this->belongsTo('App\Event','event_id');
    }
    function hall()
    {
        return $this->belongsTo('App\Hall','hall_id');
    }
}
