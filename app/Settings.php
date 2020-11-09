<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{

    public function getNameAttribute($value){

        return ucfirst($value);

    }

    protected $fillable=[

        'vat',
        'shipping_charge',
        'shop_name',
        'email',
        'phone',
        'phone_two',
        'address',
        'logo',
        'facebook',
        'twitter',
        'twitter',
        'instagram',

    ];
}
