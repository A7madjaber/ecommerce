<?php

namespace App;

use App\Model\Admin\Product;
use Illuminate\Database\Eloquent\Model;

class OrderDetials extends Model
{
    public function getNameAttribute($value){

        return ucfirst($value);

    }

    protected $fillable=[
        'order_id',
        'product_id',
        'product_name',
        'size',
        'color',
        'singleprice',
        'totalprice',
        'quantity',
    ];


    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }

    public function product(){

        return $this->belongsTo(Product::class,'product_id');
    }
}
