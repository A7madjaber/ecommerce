<?php

namespace App\model\Admin;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public function getNameAttribute($value){

        return ucfirst($value);

    }
    protected $fillable=['discount','coupon'];
}
