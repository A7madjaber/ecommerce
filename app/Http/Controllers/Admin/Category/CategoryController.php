<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

        $this->middleware('permission:read_categories')->only(['index']);
        $this->middleware('permission:create_categories')->only('store');
        $this->middleware('permission:update_categories')->only(['edit','update']);
        $this->middleware('permission:delete_categories')->only(['destroy']);

    }


    public function index()
    {
        $category = Category::all();
        return view('admin.category.category', compact('category'));

    }

    public function store(Request $request)
    {

        $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);
        Category::create($request->all());
        return Redirect()->back()->with(['message' => 'Category Added Successfully', 'alert-type' => 'success']);
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit_category', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([

            'category_name' => 'required|max:255|unique:categories,category_name,'.$id,
        ]);

        Category::findOrFail($id)->update($request->all());
        return Redirect()->route('admin.category.all')
            ->with(['message' => 'Category Updated Successfully', 'alert-type' => 'success']);
    }



    public function destroy(Request $request)
    {

        Category::findOrFail($request->id)->delete();

        return response()->json(['message'=>'Category Deleted Successfully','status'=>true],200);

    }
}
