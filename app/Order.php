<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'user_id',
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
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function orderDetails(){

        return $this->hasOne(OrderDetials::class);
    }
}
