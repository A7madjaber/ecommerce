<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{

    public function getNameAttribute($value){

        return ucfirst($value);

    }
}
