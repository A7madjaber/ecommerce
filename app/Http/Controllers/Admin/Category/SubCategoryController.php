<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function subCategory(){

         $subCategory=Subcategory::all();
         $categories=Category::all();
         return view('admin.category.subcategory',compact('subCategory','categories'));
  }


   public function store(Request $request){

     $request->validate([
      'category_id' => 'required',
      'subcategory_name' => 'required',

   	]);
     Subcategory::create($request->all());
           return Redirect()->back()->with(['message'=>'Sub Category Inserted Successfully','alert-type'=>'success']);
   }





   public function edit($id){

       $subCategory=Subcategory::FindOrFail($id);
       $categories = Category::all();
       return view('admin.category.edit_subcat',compact('subCategory','categories'));

  }

  public function update(Request $request, $id){
      $request->validate([
          'category_id' => 'required',
          'subcategory_name' => 'required',
      ]);
      Subcategory::findOrFail($id)->update($request->all());
            return Redirect()->route('admin.subCategory.all')
                ->with([ 'message'=>'Sub Category Updated Successfully','alert-type'=>'success']);
     }


    public function destroy(Request $request)
    {
        Subcategory::findOrFail($request->id)->delete();
        return response()->json(['message'=>'Sub Category Deleted Successfully','status'=>true],200);

    }


}
