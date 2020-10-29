<?php

namespace App\Http\Controllers;

use App\Whishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WhishlistController extends Controller
{



    public function all(){

       $products= Whishlist::where('user_id', Auth::id())->get();
       return view('front.wishlist',compact('products'));
    }


    public function add(Request $request)
{

    if (Auth::check()) {
        $userID = Auth::id();
         $check=Whishlist::where('user_id',$userID)->where('product_id',$request->id)->first();

        if($check==null){
            Whishlist::create([
                'user_id' => $userID,
                'product_id' => $request->id,
            ]);
            return response()->json(['message' => 'Product Already in your WishList','icon'=>'success']);
        }else{
            return response()->json(['message' => 'Product Already Has on your WishList','icon'=>'error']);

        }

    }
    else {
        return response()->json(['message'=>'You must be login FIRST','icon'=>'warning']);
    }
}


    public function remove(Request $request){


        $useID=Auth::id();
        Whishlist::where('user_id',$useID)->where('product_id',$request->id)->delete();

        return response()->json(['message'=>'Product Deleted From Whislist','icon'=>'info']);

    }

}
