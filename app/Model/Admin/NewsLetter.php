<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
    public function getNameAttribute($value){

        return ucfirst($value);

    }

    protected $fillable=['email'];
}
