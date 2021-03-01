<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message; 
//use Illuminate\Support\Facades\Request;

class MessageController extends Controller
{
    public function create(Request $request){
        // Create message in database 
        // Create a row based on object

        $message = new Message();

        $message->title=$request->title; 
        $message->content=$request->content;

        $message->save();

        return redirect("/");
        
        //$message->title=$request->input("title");
    }

    public function view($id){//Laravel knows id
        $message=Message::findOrFail($id); //findorfail?

        return view("message", ["message"=>$message]);
    }
}
