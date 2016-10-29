<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $table = 'alerts';

    protected $fillable =['title','content','type','groupid'];

    public function roles(){
    	return $this->belongsToMany('App\Role');
    }
}
