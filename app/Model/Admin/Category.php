<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function getNameAttribute($value){

        return ucfirst($value);

    }
    protected $fillable = [
            'category_name'
        ];

    public function subCategories(){
        return $this->hasMany(Subcategory::class);
    }

    public function Products(){
        return $this->hasMany(Product::class);
    }



}
