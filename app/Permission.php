<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $fillable = ['userid','groupid','funcid','mask'];

    public function users(){
    	return $this->belongsToMany('App\User');
    }

    public function groups(){
    	return $this->belongsToMany('App\Role');
    }

    public function functions(){
    	return $this->belongsToMany('App\Function');
    }
}
