<?php

namespace App\Http\Controllers;

use App\model\Admin\Coupon;
use App\Model\Admin\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(Request $request){


        $product=Product::findOrFail($request->product_id);

            $price=$product->discount_price==null ? $product->price : $product->discount_price;

           Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->qty,
                'price' =>$price,
                'weight' => 1,
                'options' =>
                     [   'size' => $request->size,
                         'image' => $product->image_one,
                         'color' => $request->color,
                     ]

            ]);
        return response()->json(['message'=>'Successfully Added on Your Cart','icon'=>'success']);


    }


    public function show(){
        $cart=Cart::content();
        return view('front.cart',compact('cart'));
    }

    public function remove(Request $request){

        $remove=Cart::remove($request->id);


        return response()->json(['message' => 'Product Deleted From cart','icon'=>'success']);

    }

    public function qtyupdate(Request $request){

       if (Session('coupon')){
           return response()->json(['message' => 'First Cancel Coupon','icon'=>'warning']);
       }
        Cart::Update($request->id,$request->qty);
        return response()->json(['message' => 'Product Quantity Updated','icon'=>'success']);

    }

  public function destroy(){

        Cart::destroy();
        return response()->json(['message' => 'All Product Deleted from cart','icon'=>'success']);

    }



    public function checkout(){

        $cart=Cart::content();
        return view('front.checkout',compact('cart'));
    }




    public function coupon(Request $request){
        $coupon = Coupon::where('coupon',$request->coupon)->first();

               if ($coupon!=null){
                   Session::put('coupon',
                       [
                           'name'=>$coupon->coupon,
                           'discount'=>$coupon->discount,
                           'balance'=>Cart::Subtotal()-$coupon->discount,
                       ]);
                   return response()->json(['message'=>'Applied Coupon','icon'=>'success']);
               }else{
                   return response()->json(['message'=>'Plz Check Your Coupon','icon'=>'error']);
               }

    }



    public function couponremove(){
        Session::forget('coupon');
        return response()->json(['message'=>' Coupon Canceled','icon'=>'success']);
    }



}
