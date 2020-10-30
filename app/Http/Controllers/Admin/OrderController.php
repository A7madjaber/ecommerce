<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(){
    $this->middleware('auth:admin');

    }

    public function all(){

        $order=Order::all();
        return view('admin.order.all',compact('order'));
    }

    public function view($id){
        $order=Order::findOrFail($id);

        $products=$order->orderDetails()->with('product')->get();

        return view('admin.order.view',compact('order','products'));
    }

//    method for accept payment of order

    public function accept($id){
        Order::findOrFail($id)->update(['status'=>1]);
        return response()->json(['message' => 'Payment Accepted Successfully','icon'=>'success']);

    }

    //    method for accept cancel of order
    public function cancel($id){

        Order::findOrFail($id)->update(['status'=>4]);
        return response()->json(['message' =>'Order Canceled Successfully','icon'=>'success']);
    }


    //    method for accept process-delivery order
    public function processDelivery($id){

        Order::findOrFail($id)->update(['status'=>2]);
        return response()->json(['message' =>'Order Send To Delivery  Successfully','icon'=>'success']);
    }

    //    method for accept Done process-delivery order
    public function deliveryDone($id){

        Order::findOrFail($id)->update(['status'=>3]);
        return response()->json(['message' => 'Delivery Process Successfully Done','icon'=>'success']);
    }
}
