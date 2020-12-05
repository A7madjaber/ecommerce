<?php

namespace App\Http\Controllers\Admin\Category;
use App\Mail\CouponMail;
use App\Model\Admin\Coupon;
use App\Http\Controllers\Controller;
use App\Model\Admin\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CouponController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:read_coupon')->only(['index']);
        $this->middleware('permission:create_coupon')->only(['store']);
        $this->middleware('permission:update_coupon')->only(['edit','update','sendCoupon']);
        $this->middleware('permission:delete_coupon')->only(['destroy']);

        $this->middleware('permission:read_newsLetter')->only(['newsletters']);
        $this->middleware('permission:update_newsLetter')->only(['destroy']);
        $this->middleware('permission:delete_newsLetter')->only(['deleteNewslettersAll','deleteNewsletters']);
    }


    public function index(){

  	$coupon = Coupon::all();
  	return view('admin.Coupon.coupon',compact('coupon'));
  }


  public function store(Request $request){
      $request->validate([
          'coupon' => 'required|unique:coupons|max:55',
          'discount' => 'required',
      ]);
      $coupon= Coupon::create($request->all());

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


    public function deleteNewslettersAll(Request $request)
    {

            NewsLetter::whereIn('id',$request->ids)->delete();

        return Redirect()->back()
            ->with(['message' => 'Subscribers Deleted Successfully ', 'alert-type' => 'success']);
    }



    public function sendCoupon($id){
         $coupon=Coupon::findOrFail($id);

        $mails= NewsLetter::select('email')->get();
        foreach ( $mails as $email) {
            Mail::to($email)->send(new CouponMail($coupon));
        }
        return Redirect()->back()
            ->with(['message' => 'Coupon Send Successfully', 'alert-type' => 'success']);
    }
}
