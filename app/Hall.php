<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    //
   
    protected $fillable = ['name', 'location','capacity','image','ac','podium_mike','video_projector','mike_with_card','cordless_hand_mike','cordless_collar_mike','laser_pointer'];
    protected $image_path = '/images/events/';
    function getQualifiedName(){
        return $this->name. ", " .$this->location;
    }
    function getImageUrl(){
        if(empty($this->image)){
            return $this->image_path . 'default.png';            
        }
        else{
            return $this->image_path . $this->image;            
        }
    }
    function registration()
    {
        return $this->hasMany('App\Registration');
    }
    function organizers(){
        return $this->belongsToMany('App\User', 'incharges');        
    }
    
}
