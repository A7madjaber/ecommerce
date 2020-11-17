<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Brand;
use App\Model\Admin\Category;
use App\Model\Admin\Product;
use App\Model\Admin\Subcategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{

    public function __construct(){
    $this->middleware('auth:admin');
    }
    public function product()
    {
        $product=Product::all();


        return view('admin.product.product',compact('product'));
    }

    public function create()
    {
        $category=Category::all();
        $brand=Brand::all();
        return view('admin.product.create',compact('category','brand'));
    }

    public function getsubcategories($category_id){
        $cat = Subcategory::wherecategory_id($category_id)->get();
        return json_encode($cat);
    }


    public function store(Request $request){
        $path = $request->video;
        $url=str_replace('watch?v=','embed/',$path );
        Product::saveImages($request);
        Product::create([
                    'image_one' => date("m.d.y").$request->file('image_one')->getClientOriginalName(),
                    'image_two' => date("j, n, Y").$request->file('image_two')->getClientOriginalName(),
                     'image_three' => date("Ymd").$request->file('image_three')->getClientOriginalName(),
                      'video' =>$url,
                       ]+ $request->all());

        return redirect()->route('admin.product.all')->with(['message'=>'Product Inserted Successfully','alert-type'=>'success']);


    }



    public function status(Request $request)
    {
        $product= Product::findOrFail($request->id);

        if ($product->status==1){
            $product->update(['status'=>0]);
            return response()->json(['message'=>'Status Set Un-Active Successfully','status'=>true],200);
        }else{
            $product->update(['status'=>1]);
            return response()->json(['message'=>'Status Set Active Successfully','status'=>true],200);
        }

    }


    public function show($id)
    {
       $product=Product::findOrFail($id);
       return view('admin.product.show',compact('product'));
    }



    public function edit($id)
    {


        $categories=Category::all();
        $brands=Brand::all();
        $subcategories=Subcategory::all();
        $product=Product::findOrFail($id);
        return view('admin.product.edit',compact('product','brands','categories','subcategories'));
    }



    public function update(Request $request, $id)
    {
        $path = $request->video;
        $url=str_replace('watch?v=','embed/',$path );


        $product= Product::findOrFail($id);

        if($request->file('image_one')){
              if (file_exists('public/media/product/'.$product->image_one)){
               unlink('public/media/product/'.$product->image_one);
              }

              $ImageOne = Image::make($request->image_one);
              $ImageOne->save('public/media/product/'.date("Ymd").
                  $request->file('image_one')->getClientOriginalName());
              $image_one_database=date("Ymd").$request->file('image_one')->getClientOriginalName();
        }else{
            $image_one_database=$request->old_image_one;

        }

        if($request->file('image_two')){

            if (file_exists('public/media/product/'.$product->image_two)){
                unlink('public/media/product/'.$product->image_two);
            }

            $ImageTwo = Image::make($request->image_two);
            $ImageTwo->save('public/media/product/'.time().
                $request->file('image_two')->getClientOriginalName());

            $image_two_database=time().$request->file('image_two')->getClientOriginalName();
        }else{
            $image_two_database=$request->old_image_two;
        }


        if($request->file('image_three')){

            if (file_exists('public/media/product/'.$product->image_three)){
                unlink('public/media/product/'.$product->image_three);
            }
            $ImageThree = Image::make($request->image_three);
            $ImageThree->save('public/media/product/'.date("j, n, Y").
                $request->file('image_three')->getClientOriginalName());
            $image_three_database=date("j, n, Y").$request->file('image_three')->getClientOriginalName();
        }else{
            $image_three_database=$request->old_image_three;
        }

        $product->update([
                'image_one' =>  $image_one_database,
                'image_two' =>  $image_two_database,
                'image_three' =>$image_three_database,
                'video' =>$url,
            ]+ $request->all());

        return redirect()->route('admin.product.all')
            ->with(['message'=>'Product Updated Successfully','alert-type'=>'success']);

    }



        public function destroy(Request $request){
        $product= Product::findOrFail($request->id);

        if ($product->image_one){
            if (file_exists('public/media/product/'.$product->image_one)){
                unlink('public/media/product/'.$product->image_one);
            }
        }


            if ($product->image_two) {
                if (file_exists('public/media/product/' . $product->image_two)) {
                    unlink('public/media/product/' . $product->image_two);
                }
            }

            if ($product->image_three) {
                if (file_exists('public/media/product/' . $product->image_three)) {
                    unlink('public/media/product/' . $product->image_three);
                }
            }

     $product->delete();
        return response()->json(['message'=>'Product Deleted Successfully','status'=>true],200);
    }


}
