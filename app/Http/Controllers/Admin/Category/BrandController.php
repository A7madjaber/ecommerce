<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Brand;

class BrandController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');

        $this->middleware('permission:read_brands')->only(['index']);
        $this->middleware('permission:create_brands')->only('store');
        $this->middleware('permission:update_brands')->only(['edit','update']);
        $this->middleware('permission:delete_brands')->only(['destroy']);

    }


    public function index(){
        $brand = Brand::all();
        return view('admin.category.brand',compact('brand'));
    }



    public function store(Request $request){
         $request->validate([
             'brand_name' => 'required|unique:brands|max:55',
         ]);
          $data = array();
         $data['brand_name'] = $request->brand_name;
         $image = $request->file('brand_logo');
         if ($image) {

             $data['brand_logo']=Brand::photo($request);
               Brand::create($data);
           return Redirect()->back()->with(['message'=>'Brand Inserted Successfully','alert-type'=>'success']);
         }else{
             Brand::create($data);
             return Redirect()->back()->with(['message'=>'Brand Inserted Successfully','alert-type'=>'success']);
         }

 }


  public function edit($id){
      $brand= Brand::findOrFail($id);
  	return view('admin.category.edit_brand',compact('brand'));

  }

  public function update(Request $request, $id){

      $request->validate([
          'brand_name' => 'required|unique:brands,brand_name,'.$id,
      ]);
      $brand=Brand::findOrFail($id);

      $oldlogo = $request->old_logo;
         $data = array();
         $data['brand_name'] = $request->brand_name;
         $image = $request->file('brand_logo');
         if ($image) {
             $data['brand_logo']=$brand->photo($request);
             unlink($oldlogo);
             $brand->update($data);

           return Redirect()->route('admin.brand.all')
               ->with(['message'=>'Brand Updated Successfully','alert-type'=>'success']);
         }else{
             Brand::findOrFail($id)->update($data);
             return Redirect()->route('admin.brand.all')
                 ->with(['message'=>'Update Without Images','alert-type'=>'success']);
         }
     }


    public function destroy(Request $request)
    {
        $brand= Brand::findOrFail($request->id);
        if($brand->brand_logo){
            if (file_exists($brand->brand_logo)) {
                unlink($brand->brand_logo);
            }
        }
        $brand->delete();
        return response()->json(['message'=>'Brand Deleted Successfully','status'=>true],200);
    }


}
