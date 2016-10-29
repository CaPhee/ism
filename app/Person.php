<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';

    protected $fillable =['name','age','address','phone','sex','hireday','userid'];

    public function user(){
    	return $this->hasOne('App\User');
    }
}
