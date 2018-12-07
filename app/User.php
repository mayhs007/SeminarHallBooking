<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password','roll_no','role_id','type'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    function roles(){
        return $this->belongsToMany('App\Role');
    }
    function clubs(){
        return $this->hasOne('App\Club');
    }
    function registration()
    {
        return $this->hasMany('App\Registration');
    }
    function hasRole($role_name){
        if($this->roles()->where('role_name', $role_name)->count()){
            return true;
        }
        return false;
   }
   function organizings(){
    return $this->belongsToMany('App\Hall', 'incharges');
}
 
    
}
