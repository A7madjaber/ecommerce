<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Admin\Brand;
use App\Model\Admin\Category;
use App\Model\Admin\Product;
use App\Model\Admin\Subcategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product($id)
    {

        $product = Product::findOrFail($id);
        if (count($product->ratings)>0) {
            $avg = $product->ratings()->avg('rating_count');
        }else{
            $avg=0;
        }

        return view('front.product-details', compact('product','avg'));

    }

    public function addCart(Request $request)
    {

        $product = Product::findOrFail($request->product_id);

        $price = $product->discount_price == null ? $product->price : $product->discount_price;

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $price,
            'weight' => 1,
            'options' =>
                ['size' => $request->size,
                    'image' => $product->image_one,
                    'color' => $request->color,
                ]

        ]);
        return redirect()->route('show.cart')->with(['message' => 'Product Successfully Added to Cart', 'alert-type' => 'success']);

    }


    public function view($id)
    {
        $product = Product::findOrFail($id);
        $category=$product->category->category_name;
        $brand=@$product->brand->brand_name;
        $subCategory=@$product->subcategory->subcategory_name;


        $color = explode(',', $product->color);

        $size = explode(',', $product->size);

        return response()->json(array(
            'product' => $product,
            'color' => $color,
            'size' => $size,
            'category'=>$category,
            'brand'=>$brand,
            'subcategory'=>$subCategory,

        ));

    }



    public  function subcategory($id){
        $subcategory= Subcategory::findOrFail($id)->subcategory_name;

        $products = Product::wherestatus(1)->whereHas('subcategory',function ($query)use ($subcategory){
                return $query->where('subcategory_name',$subcategory);
            })->paginate(10);


        $brands=[];

        foreach ($products as $pro) {
            $brands[] = Brand::all()
                ->where('id', $pro->brand_id)->first();
        }

          $brands = array_unique($brands);
        return view('front.shop.subcategory-products',compact('products','categories','brands','subcategory'));

    }


 public  function category($id){
        $category= Category::findOrFail($id)->category_name;

        $categories=Category::where('id','!=', $id)->get();

          $subcategories=Subcategory::whereHas('category',function ($query)use ($category){
                return $query->where('category_name',$category);
         })->get();

        $products = Product::wherestatus(1)->whereHas('category',function ($query)use ($category){
                return $query->where('category_name',$category);
            })->paginate(10);

        $brands=[];

        foreach ($products as $pro) {
            $brands[] = Brand::all()
                ->where('id', $pro->brand_id)->first();
        }

          $brands = array_unique($brands);
        return view('front.shop.Category-products',
            compact('products','subcategories','brands','category','categories'));

    }



    public  function brand($id){
        $brand= Brand::findOrFail($id)->brand_name;

        $brands=Brand::where('id','!=', $id)->get();

        $products = Product::wherestatus(1)->whereHas('brand',function ($query)use ($brand){
            return $query->where('brand_name',$brand);
        })->paginate(10);




        $subcategories=[];

        foreach ($products as $pro) {
            $subcategories[] = Subcategory::all()
                ->where('id', $pro->sub_category_id)->first();
        }

        $subcategories = array_unique($subcategories);
        return view('front.shop.brand-products',compact('products','subcategories','brands','brand'));

    }

    public function search(Request $request){


        $products=Product::where('name','LIKE',"%$request->product%")->paginate(10);



        $brands=[];
        foreach ($products as $pro) {
            $brands[] = Brand::all()
                ->where('id', $pro->brand_id)->first();
        }

        $categories=[];
        foreach ($products as $pro) {
            $categories[] = Category::all()
                ->where('id', $pro->category_id)->first();
        }


         $subcategories=[];
        foreach ($products as $pro) {
            $subcategories[] = Subcategory::all()
                ->where('id', $pro->sub_category_id)->first();
        }

        $subcategories = array_unique($subcategories);
        $categories = array_unique($categories);
         $brands = array_unique($brands);

        $search=$request->product;
        return view('front.shop.search',compact('products','subcategories','categories','brands','search'));
    }

}
