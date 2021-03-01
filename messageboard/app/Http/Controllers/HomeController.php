<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message; 

class HomeController extends Controller
{
    
    public function index (){

        // all() grabs all of the rows in a table from our Model Message
        $messages=Message::all();

        // This will be performed in the home view

        // foreach($messages as $message){
        //     // Each row is an object; reference each title by using 
        //     // the accessor operator 

        //     echo $message->title; 
        // };

        return view('home', ["messages"=>$messages]);
    }
    
}
