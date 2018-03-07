<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = ['name', 'priority'];
    function getQualifiedName(){
        return $this->name. ", " .$this->location;
    }
    function registration()
    {
        return $this->hasMany('App\Registration');
    }
}
