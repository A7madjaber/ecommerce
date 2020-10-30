<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'user_id',
        'payment_type',
        'payment_id',
        'paying_amount',
        'blnc_transection',
        'stripe_order_id',
        'subtotal',
        'shipping',
        'vat',
        'total',
        'status',
        'date',
        'month',
        'year',
        'status_code',
    ];


    public function user(){

        return $this->belongsTo(User::class);
    }

    public function orderDetails(){


        return $this->hasOne(OrderDetials::class,'order_id','id');
    }

    public function ship(){

        return $this->hasOne(Shipping::class,'order_id','id');
    }
}
