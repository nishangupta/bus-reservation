<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
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
        $message->receiver = $request->receiver;

        if ($message->save()) {
            $response = $request->txt;
        } else {
            $response = null;
        }

        return [
            'message' => $message,
        ];
    }

    public function getMessages()
    {
        //get latest 15 messages
        $messages = Message::where('sender', auth()->user()->id)
            ->orWhere('receiver', auth()->user()->id)
            ->take(25)->latest()->get();

        foreach ($messages as $message) {
            $message->created_date = $message->created_at->diffForHumans();
        }
        return $messages;
    }

    //here userId becomes a user
    public function getCustomerMessages(User $userId)
    {
        abort_if($userId->hasRole('admin'), 403);

        $messages = Message::where('sender', $userId->id)
            ->orWhere('receiver', $userId->id)
            ->take(25)->latest()->get();;

        foreach ($messages as $message) {
            $message->created_date = $message->created_at->diffForHumans();
        }
        return $messages;
    }


    public function getCustomerList()
    {
        $users = User::role('user')->withCount('messages')->select(['id', 'name', 'email'])->get();
        $newUsers = [];
        foreach ($users as $user) {
            if ($user->messages()->count()) {
                $newUsers[] = $user;
            }
        }
        return $newUsers;
    }
}
