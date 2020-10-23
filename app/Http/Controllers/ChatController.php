<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat.index');
    }

    public function store(Request $request)
    {
        $message  = new Message();

        $message->txt = $request->txt;
        $message->sender = auth()->user()->id;
        $message->reciever = $request->receiver;

        if ($message->save()) {
            $response = $request->txt;
        } else {
            $response = null;
        }

        return [
            'message' => $response,
        ];
    }

    public function getUserMessages($user)
    {
    }
}
