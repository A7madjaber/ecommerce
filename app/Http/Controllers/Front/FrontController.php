<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Admin\NewsLetter;
use App\Model\Admin\Subcategory;
use App\Model\Blog\BlogPost;
use App\Order;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function subscribenewsLetter(Request $request){

        $request->validate([
            'email'=> 'required|email|unique:news_letters',
        ]);



        NewsLetter::create($request->all());
        return redirect()->route('home')->with(['message'=>'Thanks for Subscribing','alert-type'=>'success']);
    }



    public function posts(){

        $posts=BlogPost::all();
        return view('front.blog.index',compact('posts'));
    }
    public function post($id){


        $post=BlogPost::findOrFail($id);

        $category= $post->category->name;
        $relatePosts = BlogPost::where('id', '!=' ,$post->id)
            ->whereHas('category',function ($query)use ($category){
                return $query->where('name',$category);
            })->get();


        return view('front.blog.post',compact('post','relatePosts'));

    }


    public function track(Request $request){

        $order=Order::where('status_code',$request->code)->first();

        if($order!=null){
            if (auth()->id() == $order->user_id){

                return view('front.tracking',compact('order'));
            }else{
                return redirect()->back()->with(['message'=>'Invalid Status Code','alert-type'=>'error']);

            }

        }else return redirect()->back()->with(['message'=>'Invalid Status Code','alert-type'=>'error']);
    }
}
