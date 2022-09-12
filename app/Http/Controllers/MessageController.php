<?php


namespace App\Http\Controllers;


class MessageController extends Controller
{
    public function thank(){

        $message = "Thank You!";

        return view('thanku',compact('message'));

    }

}
