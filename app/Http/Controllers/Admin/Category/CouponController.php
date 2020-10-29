<?php

namespace App\Http\Controllers\Admin\Category;
use App\Model\Admin\Coupon;
use App\Http\Controllers\Controller;
use App\Model\Admin\NewsLetter;
use Illuminate\Http\Request;

class CouponController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function coupon(){
  	$coupon = Coupon::all();
  	return view('admin.Coupon.coupon',compact('coupon'));
  }


  public function store(Request $request){
      $request->validate([
          'coupon' => 'required|unique:coupons|max:55',
          'discount' => 'required',
      ]);
      Coupon::create($request->all());
      return Redirect()->back()->with(['message'=>'Coupon Inserted Successfully','alert-type'=>'success']);
     }


    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.Coupon.edit', compact('coupon'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'coupon' => 'required|max:55|unique:coupons,coupon,'.$id,
            'discount' => 'required',
        ]);

        Coupon::findOrFail($id)->update($request->all());
        return Redirect()->route('admin.coupon.all')
            ->with(['message' => 'Coupon Updated Successfully', 'alert-type' => 'success']);
    }



    public function destroy(Request $request)
    {
        Coupon::findOrFail($request->id)->delete();
        return response()->json(['message'=>'Coupon Deleted Successfully','status'=>true],200);
    }


    public function newsletters(){
         $sub=NewsLetter::all();
         return view('admin.coupon.news',compact('sub'));

     }


    public function deleteNewsletters(Request $request)
    {
        NewsLetter::findOrFail($request->id)->delete();
        return response()->json(['message'=>'Subscriber Deleted Successfully','status'=>true],200);
    }
}
