<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Model\Admin\Product;
use App\Order;
use App\OrderDetials;
use App\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function payment(){
        $cart=Cart::content();
        return view('front.payment',compact('cart'));
    }

    public function  PaymentProcess(Request $request){


        $data=$request->all();

        if ($request->payment ='strip'){
            return view('front.payment.stripe',compact('data'));



        }elseif ($request->payment=='paypal'){


        }elseif ($request->payment=='ideal'){

        }else{
            return 'cash on delivery';
        }
    }


    public function stripe(Request $request){


        // Set your secret key. Remember to switch to your live secret key in production!
// See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51HhEdOHkRBs1IQbgIfSaq1B7BY04IPFNsOptiBHlQwDPbyuqiZzgmZIa3g6f1voyzRGowubBqcQ4sANIhMRF70xd00hPSzzC7U');

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
//
        $user=Auth::user();
        $total=$request->total;
        $subtotal=Session::has('coupon') ? Session::get('coupon')['balance'] : Cart::Subtotal();


        $token = $_POST['stripeToken'];
        $charge = Charge::create([
            'amount' => $total*100,
            'currency' => 'usd',
            'description' => 'Ahmed Shop Details',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);


       $order= Order::create([
            'user_id'=>$user->id,
            'payment_id'=>$charge->payment_method,
            'payment_type'=>$request->payment_type,
            'paying_amount'=>$charge->amount,
            'blnc_transection'=>$charge->balance_transaction,
            'stripe_order_id'=>$charge->metadata->order_id,
            'subtotal'=>$subtotal,
            'shipping'=>$request->shipping,
            'vat'=>$request->vat,
            'status'=>0,
            'total'=>$total,
            'date'=>date('d-m-y'),
            'month'=>date('F'),
            'year'=>date('Y'),
            'status_code'=>mt_rand(100000,999999),


                   ]);


       Shipping::create([
           'order_id'=> $order->id,
           'ship_name'=> $request->ship_name,
           'ship_phone'=> $request->ship_phone,
           'ship_email'=> $request->ship_email,
           'ship_address'=> $request->ship_address,
           'ship_city'=> $request->ship_city,

       ]);


        foreach (Cart::content() as $row){


            $product=Product::where('id',$row->id)->first();
            $qty=$product->buyone_getone== 0 ? $row->qty :$row->qty*2;

            echo  OrderDetials::create([
                'order_id'=>$order->id,
                'product_id'=>$row->id,
                'quantity'=>$qty,
                'product_name'=>$row->name,
                'size'=>$row->options->size,
                'color'=>$row->options->color,
                'singleprice'=>$row->price,
                'totalprice'=>$row->price * $row->qty,
            ]);

        }

   Cart::destroy();
      Session::has('coupon') ? Session::forget('coupon') : '';

      Mail::to($user->email)->send(new InvoiceMail($order));

      return redirect()->route('home')->with(['message'=>'Order Process Successfully Done','alert-type'=>'success']);


    }


}
