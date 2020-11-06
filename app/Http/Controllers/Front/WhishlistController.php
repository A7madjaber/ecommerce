<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
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
            return response()->json(['message' => 'Product Added to your WishList','icon'=>'success']);
        }else{
            return response()->json(['message' => 'Product Already in your WishList','icon'=>'error']);

        }

    }
    else {
        return response()->json(['message'=>'You must be login FIRST','icon'=>'warning']);
    }
}


    public function remove($id){


     Whishlist::findOrFail($id)->delete();
       return redirect()->back()->with(['message' => 'Product deleted Successfully', 'alert-type' => 'success']);

    }

}
