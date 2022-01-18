<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

class MessageController extends Controller
{
    public function sendMessage(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                "text" => "required|max:1000",
                "chatUserId" => ["required", "exists:users,id"]
            ]
        );

        if ($validator->fails()) return redirect('dashboard');

        // save the message
        $message = new Message;
        $message->user_from_id = Auth::user()->id;
        $message->user_to_id = $request->chatUserId;
        $message->text = $request->text;
        $message->save();

        // MessageSent::dispatch($message);
        event(new MessageSent($message));

        return response('Message saved', 200);
    }

    public function sendImageMessage(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                "image" => "required|image|mimes:jpeg,png,jpg",
                "chatUserId" => ["required", "exists:users,id"]
            ]
        );

        if ($validator->fails()) return redirect('dashboard');

        $fileName = time().'_'.$request->image->getClientOriginalName();
        $path = $request->file('image')->storeAs(
          'images/messages/', $fileName, 'public'
        );

        $message = new Message;
        $message->image = $fileName;
        $message->user_from_id = Auth::user()->id;
        $message->user_to_id = $request->chatUserId;
        $message->save();

        return redirect()->back();
    }
}
