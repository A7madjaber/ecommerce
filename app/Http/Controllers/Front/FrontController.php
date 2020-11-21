<?php

namespace App\Http\Controllers\Front;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Model\Admin\NewsLetter;
use App\Model\Admin\Product;
use App\Model\Admin\Subcategory;
use App\Model\Blog\BlogPost;
use App\Order;
use App\Rating;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


public function returnOrderList(){


        $orders=Order::where('user_id',Auth::id())->orderBy('created_at','desc')->get();
        return view('profile.return_order',compact('orders'));
}

    public function returnOrder($id){


        $order=Order::where('user_id',Auth::id())->where('id',$id);
        $order->update(['return_order'=>1]);

        return redirect()->back()->with(['message'=>'Your Request Return Order Done ','alert-type'=>'success']);
    }



    public function contact(){
        return view('front.contact');
    }

   public function  contactSend(Request $request){
        Contact::create($request->all());
       return Redirect()->route('homes')->with(['message' => 'Your  Message Send Successfully', 'alert-type' => 'success']);
    }



    public function rating(Request $request)
    {

       $product= Product::findOrFail($request->id);

        $product_id = $product->id;

        $rating_count = $request->val;

        $user_ip = $request->ip();

        Rating::firstOrCreate(['product_id'=>$product_id, 'ip'=>$user_ip], ['rating_count'=>$rating_count]);
         return response()->json(['message'=>'Thank Your For Rating','icon'=>'success']);
    }

}


