<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Mail\MessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function all(){
        $messages=Contact::orderBy('created_at','desc')->get();
        return view('admin.message.all',compact('messages'));

    }

    public function show($id){
     $message=Contact::findOrFail($id);
     $message->update(['read_id'=>1]);
        return view('admin.message.show',compact('message'));
    }

    public function replay(Request $request){
        Mail::to($request->email)->send(new MessageMail($request->replay,'Thank To send us'));
        return redirect()->route('admin.message.all')->with(['message'=>'Replay Send Successfully','alert-type'=>'success']);
    }
}
