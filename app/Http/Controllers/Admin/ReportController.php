<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;


class ReportController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin');

    }

    public function report($date,$status){



         $orders=Order::orderBy('created_at','desc')
            ->where('date',$date)->where('status',$status)->orwhere('month',$date)->where('status',$status)->get();


         $status=$status==0 ?'Orders':'Delivery';
        return view('admin.Report.order',compact('orders','date','status'));
    }

    public function search(){
        return view('admin.Report.search');
    }

    public function searchResult(Request $request){

        if($request->date){
            $date=$request->date;
           $orders=Order::OrderBy('created_at','desc')->where('date',$request->date)->get();

        }elseif ($request->month){
            $date=$request->month;
            $orders=Order::OrderBy('created_at','desc')->where('month',$request->month)->get();

        }elseif ($request->year) {
            $date=$request->year;
            $orders = Order::OrderBy('created_at', 'desc')->where('year', $request->year)->get();
        }


        $total=$orders->where('status',3)->sum('total');

                return view('admin.Report.search-result',compact('orders','total','date'));
    }
}
