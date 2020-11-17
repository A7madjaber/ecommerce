<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class HotDeal extends Model
{

protected $fillable=['product_id','date'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
