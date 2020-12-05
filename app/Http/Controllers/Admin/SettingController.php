<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Settings;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('permission:read_settings')->only(['index']);
        $this->middleware('permission:update_settings')->only(['update']);
    }

    public function index()
    {
        $settings = Settings::all()->first();
        return view('admin.settings.settings', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        $setting= Settings::findOrFail($id)->first();


        if($request->logo){
            if (file_exists('public/media/logo/'.$setting->logo)){
                unlink('public/media/logo/'.$setting->logo);
            }
            $Image = Image::make($request->file('logo'));
            $Image->save('public/media/logo/'.date("Ymd").
                $request->file('logo')->getClientOriginalName());
            $image_database=date("Ymd").$request->file('logo')->getClientOriginalName();
        }else{
            $image_database=$request->old_image;

        }

        $setting->update([
                'logo' =>  $image_database,

            ]+ $request->all());

        return redirect()->back()
            ->with(['message'=>'Settings Updated Successfully','alert-type'=>'success']);

    }
}
