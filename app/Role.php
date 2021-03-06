<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    public function users() {
        return $this->belongToMany('App\User');
    }

    public function permissions() {
        return $this->belongsToMany('App\Permission');
    }
}
