<?php

namespace App\Model\Admin;

use App\OrderDetials;
use App\Whishlist;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Product extends Model
{

    protected $fillable=[
        'category_id', 'sub_category_id', 'quantity', 'brand_id','name', 'details',
        'product_code', 'color','size','price','discount_price', 'video','main_slider','hot_deal','hot_new',
        'best_rated','mid_slider', 'trend','image_one','image_two', 'image_three', 'status','buyone_getone'
    ];


    public static function saveImages($request){

        if ($request->image_one && $request->image_two && $request->image_three){
        $ImageOne = Image::make($request->image_one);
          $ImageOne->save('public/media/product/'.date("m.d.y").
            $request->file('image_one')->getClientOriginalName());


        $ImageTwo = Image::make($request->image_two);
        $ImageTwo->save('public/media/product/'.date("j, n, Y").
            $request->file('image_two')->getClientOriginalName());




        $ImageThree = Image::make($request->image_three);
          $ImageThree->save('public/media/product/'.date("Ymd").
            $request->file('image_three')->getClientOriginalName());


        }
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class,'sub_category_id');
    }

    public function whishlist(){
        return $this->hasOne(Whishlist::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetials::class);
    }


}


