<?php


namespace App;

use App\Model\Admin\Product;
use Illuminate\Database\Eloquent\Model;

class Whishlist extends Model
{
    protected $fillable = ['product_id', 'user_id'];


    public function getNameAttribute($value){

        return ucfirst($value);

    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
