<?php

namespace App\Model\Admin;


use Illuminate\Database\Eloquent\Model;


class Brand extends Model
{
    protected $fillable = [
            'brand_name', 'brand_logo'
        ];


    public static function photo($request){

        $image = $request->file('brand_logo');
        $image_name = date('dmy_H_s_i');
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'public/media/brand/';
        $image_url = $upload_path.$image_full_name;
        $image->move($upload_path,$image_full_name);

        return  $image_url;


    }

    public function Products(){
        return $this->hasMany(Product::class);
    }
}
