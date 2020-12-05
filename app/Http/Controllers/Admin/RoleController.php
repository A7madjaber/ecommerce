<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:read_roles')->only(['index']);
        $this->middleware('permission:create_roles')->only(['create','store']);
        $this->middleware('permission:update_roles')->only(['edit','update']);
        $this->middleware('permission:delete_roles')->only(['destroy']);

    }

    public function index()
    {
        $roles=Role::whereRoleNot(['Super_admin'])->with('permissions')->get();
        return view('admin.role.all',compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|max:255',
            'permissions' => 'required | array | min:1',
            'description' => 'required',
        ]);



        $role =Role::create($request->all());
        $role->attachPermissions($request->permissions);
        return Redirect()->route('admin.role.all')
            ->with(['message' => 'Role Added Successfully', 'alert-type' => 'success']);
    }



    public function edit($id)
    {
        if ($id==1){
            abort(403);
        }

       $role=Role::findOrFail($id);
        return  view('admin.role.edit',compact('role'));
    }



    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|max:255|unique:roles,name,'.$id,
            'description' => 'required',
            'permissions' => 'required | array | min:1',
        ]);


        $Role = Role::findOrFail($id);
        $Role->update($request->all());
        $Role->syncPermissions($request->permissions);
        return redirect()->route('admin.role.all')
            ->with(['message' => 'Role Updated Successfully', 'alert-type' => 'success']);

    }



    public function destroy(Request $request)
    {
        Role::findOrFail($request->id)->delete();
        return response()->json(['message'=>'Role Deleted Successfully','status'=>true],200);
    }
}
