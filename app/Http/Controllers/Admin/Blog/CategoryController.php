<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Model\Blog\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

public function category(){
        $categories=BlogCategory::all();

        return view('admin.blog.category.all',compact('categories'));
}


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:blog_categories,name|max:255',
        ]);
        BlogCategory::create($request->all());
        return Redirect()->back()->with(['message' => 'Category Added Successfully', 'alert-type' => 'success']);
    }


    public function edit($id)
    {
        $category = BlogCategory::findOrFail($id);
        return view('admin.blog.category.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([

            'name' => 'required|max:255|unique:blog_categories,name,'.$id,

        ]);

       

        BlogCategory::findOrFail($id)->update($request->all());
        return Redirect()->route('admin.blog.category.all')
            ->with(['message' => 'Category Updated Successfully', 'alert-type' => 'success']);
    }






    public function destroy(Request $request)
    {

        BlogCategory::findOrFail($request->id)->delete();

        return response()->json(['message'=>'Category Deleted Successfully','status'=>true],200);

    }}
