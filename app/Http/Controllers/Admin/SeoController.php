<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function seo(){
        $seo= Seo::all()->first();
        return view('admin.seo.seo',compact('seo'));
    }


    public function update(Request $request,$id){
       Seo::findOrFail($id)->update($request->all());
        return Redirect()->back()
            ->with(['message' => 'SEO Updated Successfully', 'alert-type' => 'success']);
    }
}

