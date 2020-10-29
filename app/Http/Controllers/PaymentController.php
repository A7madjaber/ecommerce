<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
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
        $token = $_POST['stripeToken'];

        $charge = Charge::create([
            'amount' => 999*100,
            'currency' => 'usd',
            'description' => 'Ahmed Shop Details',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);


        return $charge;
    }
}
