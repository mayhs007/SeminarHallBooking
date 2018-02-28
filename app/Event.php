<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = ['event_name', 'priority'];
    function getQualifiedName(){
        return $this->name. ", " .$this->location;
    }
}
