<?php

namespace App;

use App\Model\Admin\Product;
use Illuminate\Database\Eloquent\Model;

class OrderDetials extends Model
{
    //

    protected $fillable=[
        'order_id',
        'product_id',
        'quantity',
        'singleprice',
        'totalprice',
    ];


    public function order(){

        return $this->belongsTo(Order::class);
    }

    public function product(){

        return $this->belongsTo(Product::class);
    }
}
