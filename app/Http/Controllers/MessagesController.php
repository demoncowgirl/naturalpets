<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Messages;

class MessagesController extends Controller

{
    public function store(Request $request){

      $this->validate($request, [
        'name' => 'required',
        'email_address' => 'required',
        'message' => 'required'
      ]);

      $message = Message::create($request->all());
      if($message)
        return ["status" => "true", "messageId" => $id ];
    }
    return back()->('success', 'Thank you! Your message has been set.');
}
