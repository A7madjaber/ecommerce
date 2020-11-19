<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile.home');
    }

    public function profileEdit()
    {
        return view('profile.edit');
    }

    public function profileUpdate(Request $request)

    {

         $user=auth()->user();


        if($request->avatar) {
            if ($user->avatar){
                if (file_exists('public/media/user/' . $user->avatar)) {
                    unlink('public/media/user/' . $user->avatar);
                }
            }
            $avatar = Image::make($request->avatar);
            $avatar->save('public/media/user/'.date("j, n, Y").
                $request->file('avatar')->getClientOriginalName());
            $avatar_database=date("j, n, Y").$request->file('avatar')->getClientOriginalName();
        }else{
            $avatar_database=$request->old_avatar;
        }

        $request->validate([

            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'required|numeric'
        ]);

        $user->update([

                'avatar' =>$avatar_database,
            ]+ $request->all());

        return redirect()->back()
            ->with(['message'=>' Updated Successfully','alert-type'=>'success']);
    }



    public function changePassword(){
        return view('auth.changepassword');
    }

    public function updatePassword(Request $request)
    {
      $password=Auth::user()->password;
      $oldpass=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->password_confirmation;
      if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                      $user=User::find(Auth::id());
                      $user->password=Hash::make($request->password);
                      $user->save();
                      Auth::logout();
                      $notification=array(
                        'message'=>'Password Changed Successfully ! Now Login with Your New Password',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('login')->with($notification);
                 }else{
                     $notification=array(
                        'message'=>'New password and Confirm Password not matched!',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
                 }
      }else{
        $notification=array(
                'message'=>'Old Password not matched!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
      }

    }

    public function Logout()
    {

            Auth::logout();
            $notification=array(
                'message'=>'Successfully Logout',
                'alert-type'=>'success'
                 );
             return Redirect()->route('home')->with($notification);


    }
}
