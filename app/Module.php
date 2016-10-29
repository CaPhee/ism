<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';

    protected $fillable = 'name';

    public function functions(){
    	return $this->hasMany('App\Function');
    }
}
