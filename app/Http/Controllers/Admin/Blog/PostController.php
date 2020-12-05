<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Model\Blog\BlogCategory;
use App\Model\Blog\BlogPost;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
        $this->middleware('permission:read_blogPost')->only(['index']);
        $this->middleware('permission:create_blogPost')->only('store','create');
        $this->middleware('permission:update_blogPost')->only(['edit','update']);
        $this->middleware('permission:delete_blogPost')->only(['destroy']);
    }


    public function index(){
        $posts=BlogPost::all();
        return view('admin.blog.post.all',compact('posts'));
    }


    public function create(){
        $categories=BlogCategory::all();
        return view('admin.blog.post.create',compact('categories'));
    }


    public function store(Request $request){
        BlogPost::saveImage($request);

        if($request->image){
            BlogPost::create([
                    'image' => date("m.d.y").$request->file('image')->getClientOriginalName(),
                ]+ $request->all());
        }else{
            BlogPost::create($request->all());
        }

        return redirect()->route('admin.blog.post.all')->with(['message'=>'Post Inserted Successfully','alert-type'=>'success']);

    }

    public function edit($id)
    {
        $categories=BlogCategory::all();
        $post=BlogPost::findOrFail($id);
        return view('admin.blog.post.edit',compact('post','categories'));
    }


    public function update(Request $request, $id)
    {
        $post= BlogPost::findOrFail($id);

        if($request->file('image')){
            if (file_exists('public/media/post/'.$post->image)){
                unlink('public/media/post/'.$post->image);
            }

            $Image = Image::make($request->image);
            $Image->save('public/media/post/'.date("Ymd").
                $request->file('image')->getClientOriginalName());
            $image_database=date("Ymd").$request->file('image')->getClientOriginalName();
        }else{
            $image_database=$request->old_image;

        }


        $post->update([
                'image' =>  $image_database,

            ]+ $request->all());

        return redirect()->route('admin.blog.post.all')
            ->with(['message'=>'Post Updated Successfully','alert-type'=>'success']);

    }



    public function destroy(Request $request)
    {
        $post= BlogPost::findOrFail($request->id);


        if (file_exists('public/media/post/'.$post->image)){
            unlink('public/media/post/'.$post->image);
        }

        $post->delete();
        return response()->json(['message'=>'Post Deleted Successfully','status'=>true],200);
    }


}
