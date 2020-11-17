<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Brand;
use App\Model\Admin\Category;
use App\Model\Admin\HotDeal;
use App\Model\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class HotDealController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');

    }
    public function all(){
        $deals=HotDeal::all();
        return view('admin.deals.all',compact('deals'));
    }
    public function create(){
        $products=Product::wherestatus(1)->get();
        return view('admin.deals.create',compact('products'));
    }

    public function getproduct($id){
        $product = Product::where('id',$id)->first();
        $image=$product->image_one;
        $qyt=$product->quantity;

        $category=Category::where('id',$product->category_id)->first();
        $category_name=$category->category_name;


        $brand=Brand::where('id',$product->brand_id)->first();
        if($brand!=null){
            $brand_name=$brand->brand_name;
        }else{
            $brand_name='No brand';
        }
        $data=[$qyt,$category_name,$brand_name,$image];

        return  json_encode($data);
    }
    public function store(Request $request){

        HotDeal::create($request->all());
        return redirect()->route('admin.deal.all')->with(['message' => 'The Deal Added Successfully','alert-type'=>'success']);
    }


    public function edit($id){
        $deal=HotDeal::findOrFail($id);
        $products=Product::all();
        return view('admin.deals.edit',compact('deal','products'));
    }

    public function update(Request $request,$id){
       $deal=HotDeal::findOrFail($id)->update([$request->all()]);

        return Redirect()->route('admin.deal.all')
            ->with(['message' => 'Deal Updated Successfully', 'alert-type' => 'success']);



    }

    public function destroy(Request $request){
        $deal=HotDeal::findOrFail($request->id);
        $deal->delete();
        return response()->json(['message'=>'Deal Deleted Successfully','status'=>true],200);
    }

}
