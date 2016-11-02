<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $table = 'alerts';

    protected $fillable =['title','content','type','role_id'];

    public function roles(){
    	return $this->belongsToMany('App\Role');
    }
}
