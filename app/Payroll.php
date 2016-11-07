<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $connection = 'mysql1';

    public $timestamps = false;

    protected $table = 'Pay Rates';
}
