<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
	protected $connection = 'sqlsrv';

    public $timestamps = false;

    protected $table = 'Employment';

   // protected $fillable =['name','age','address','phone','sex','hireday','userid'];

    public function user(){
    	return $this->hasOne('App\User');
    }

    
}
