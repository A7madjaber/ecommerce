<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Admin;
class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function admin(){

        $admins= Admin::whereRoleNot('Super_admin')->get();
        return view('admin.admins.all',compact('admins'));
    }


    public function create(){
        $roles=Role::all();
        return view('admin.admins.create',compact('roles'));

    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'roles' => 'required | array | min:1',
        ]);



          $request->merge(['password'=>bcrypt($request->password)]);
          $Admin = Admin::create($request->all());
          $Admin->attachRoles($request->roles);

          return Redirect()->route('admin.admin.all')
              ->with(['message'=>'Admin Created Successfully','alert-type'=>'success']);
    }


    public function edit($id)
    {
       $admin= Admin::findOrFail($id);
       $roles=Role::all();
        return view('admin.admins.edit',compact('admin','roles'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'roles' => 'required | array | min:1',

        ]);

        $admin=Admin::findOrFail($id);

        if ($request->password){
            $request->merge(['password'=>bcrypt($request->password)]);
            $admin->update($request->all());
            $admin->syncRoles($request->roles);
        }else{
            $admin->update([$request->all()]);
            $admin->syncRoles($request->roles);
        }

        return redirect()->route('admin.admin.all')
            ->with(['message'=>'Admin Updated Successfully','alert-type'=>'success']);
    }


    public function destroy(Request $request)
    {
        Admin::findOrFail($request->id)->delete();
        return response()->json(['message'=>'Admin Deleted Successfully','status'=>true],200);
    }

    public function index()
    {
        return view('admin.home');
    }


    public function ChangePassword()
    {
        return view('admin.auth.changepassword');
    }

    public function Update_pass(Request $request)
    {

      $password=Auth::user()->password;
      $oldpass=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->password_confirmation;
      if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                      $user=Admin::find(Auth::id());
                      $user->password=Hash::make($request->password);
                      $user->save();
                      Auth::logout();
                           return Redirect()->route('admin.login')
                           ->with( ['message'=>'Password Changed Successfully ! Now Login with Your New Password',
                               'alert-type'=>'success']);
                 }else{
                       return Redirect()->back()
                           ->with(['message'=>'New password and Confirm Password not matched!','alert-type'=>'error']);
                 }
      }else{
               return Redirect()->back()
                   ->with(['message'=>'Old Password not matched!','alert-type'=>'error'
               ]);
      }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect()->route('admin.login')
                 ->with(['message'=>'Successfully Logout', 'alert-type'=>'success']);
    }

}
