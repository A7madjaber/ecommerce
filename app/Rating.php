<?php

namespace App;

use App\Model\Admin\Product;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    protected $fillable=[

        'product_id',
        'rating_count',
        'ip',

    ];
    public function product(){

        return $this->belongsTo(Product::class,'product_id');
    }
}
