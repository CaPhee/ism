<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    protected $connection = 'sqlsrv';

    public $timestamps = false;

    protected $table = 'Employment';
}
