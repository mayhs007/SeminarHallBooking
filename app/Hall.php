<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    //
    protected $fillable = ['name', 'location','capacity','image','a/c','podium_mike','video_projector','mike_with_card','cordless_hand_mike','cordless_collar_mike','laser_pointer'];
    protected $image_path = '/images/';
    function getQualifiedName(){
        return $this->name. ", " .$this->location;
    }
    function getImageUrl(){
        if(empty($this->image_name)){
            return $this->image_path . 'default.png';            
        }
        else{
            return $this->image_path . $this->image_name;            
        }
    }
}
