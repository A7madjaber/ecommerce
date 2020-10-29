<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Admin\NewsLetter;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function storenews(Request $request){

        $request->validate([
            'email'=> 'required|email|unique:news_letters',
        ]);
        NewsLetter::create($request->all());
        return redirect()->back()->with(['message'=>'Thanks for Subscribing','alert-type'=>'success']);
    }
}
