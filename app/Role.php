<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    protected $fillable=['name','description'];



    public function getNameAttribute($value){

        return ucfirst($value);

    }

    public function scopewhereRoleNot($query,$role_name){

        return $query->whereNotIn('name',(array)$role_name);

    }



}

