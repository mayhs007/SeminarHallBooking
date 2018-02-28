<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    //
    protected $fillable = ['name','staff_incharge'];
    function user(){
        return $this->belongsTo('App\User');
    }
    function getQualifiedName(){
        return $this->name. ", " .$this->location;
    }
}
