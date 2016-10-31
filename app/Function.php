<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Function extends Model
{
    protected $table = 'functions';

    protected $fillable =['name','moduleid'];

    public function modules(){
    	return $this->belongsTo('App\Module','foreign_key','moduleid');
    }

    public function permissions(){
    	return $this->hasMany('App\Permission');
    }
}
