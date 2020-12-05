<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth:admin');
    }

public  function index(){

        $admin=auth()->user();
        return view('admin.profile.index',compact('admin'));
    }

    public function update(Request $request){


        $admin=auth()->user();

        if($request->avatar) {
            if ($admin->avatar){
                if (file_exists('public/media/admin/' . $admin->avatar)) {
                    unlink('public/media/admin/' . $admin->avatar);
                }
            }
            $avatar = Image::make($request->avatar);
            $avatar->save('public/media/admin/'.date("j, n, Y").
                $request->file('avatar')->getClientOriginalName());
            $avatar_database=date("j, n, Y").$request->file('avatar')->getClientOriginalName();
        }else{
            $avatar_database=$request->old_avatar;
        }

        $request->validate([
            'email' => 'required|email|max:255|unique:users,email,'.$admin->id,
            'phone' => 'required|numeric',
            'name' => 'required'
        ]);

        $admin->update([
             'avatar' =>$avatar_database,
            ]+ $request->all());

        return redirect()->back()
            ->with(['message'=>' Updated Successfully','alert-type'=>'success']);

    }
}
