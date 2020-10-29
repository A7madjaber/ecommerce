<?php

use App\Model\Admin\Category;
use App\Model\Admin\product;
use App\Model\Admin\Brand;
use App\Settings;

function categories(){

return Category::all();


}
function brands(){

return Brand::all();


}

function mainSliderProduct(){
   return  Product::orderBy('created_at','DESC')->wherestatus(1)->wheremain_slider(1)->first();

}
function AllProducts(){
   return  Product::orderBy('created_at','DESC')->wherestatus(1)->take(12)->get();

}

function HotDeal(){
   return  Product::orderBy('created_at','DESC')->wherestatus(1)->wherehot_deal(1)->take(3)->get();

}

function midSliderProduct(){
    return  Product::orderBy('created_at','DESC')->wherestatus(1)->wheremid_slider(1)->take(3)->get();

}

function BuyOneGetOne(){
   return  Product::orderBy('created_at','DESC')->wherestatus(1)->wherebuyone_getone(1)->take(6)->get();

}
//
function FirstCategory(){


return  Category::with('products')
    ->whereHas('products', function($q) {
        $q->where('status',1);
    })->first();

}
function SecondCategory(){

    return  Category::with('products')
        ->whereHas('products', function($q) {
            $q->where('products.status',1);
        })->skip(3)->first();

}


function Settings(){

    return  Settings::all()->first();


}



//function BestRated(){
//   return  Product::orderBy('created_at','DESC')->wherestatus(1)->wherebest_rated(1)->get();
//
//}
