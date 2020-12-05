<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Product;
use App\Order;
use App\OrderDetials;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
        $this->middleware('permission:read_order')->only(['index','view','return']);
        $this->middleware('permission:create_order')->only('store');
        $this->middleware('permission:update_order')->only(['accept','cancel','processDelivery','deliveryDone','returnApprove']);
        $this->middleware('permission:delete_order')->only(['destroy']);
    }

    public function index(){

        $order=Order::orderBy('created_at','desc')->get();
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
       $order= Order::findOrFail($id);

       $products=OrderDetials::where('order_id',$id)->get();

       foreach ($products as $pro){
           Product::where('id',$pro->product_id)
               ->decrement('quantity', $pro->quantity);
       }


        $order->update(['status'=>2]);
        return response()->json(['message' =>'Order Send To Delivery  Successfully','icon'=>'success']);

    }

    //    method for accept Done process-delivery order
    public function deliveryDone($id){

        Order::findOrFail($id)->update(['status'=>3]);
        return response()->json(['message' => 'Delivery Process Successfully ','icon'=>'success']);
    }


    public function return(){
        $orders=Order::where('return_order','!=',0)->whereIn('status',[0,1,2,3])->orderBy('created_at','desc')->get();
        return view('admin.order.return',compact('orders'));
    }

    public function returnApprove(Request $request){

         $order=Order::findOrFail($request->id);
         $order->update(['return_order'=> 2]);
         return response()->json(['message' => 'Order Return Successfully ','icon'=>'success']);


    }
}

