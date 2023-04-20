<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChatController extends Controller
{
    private $chat;
    private $message;

    public function __construct(Chat $chat, Message $message)
    {
        $this->chat = $chat;
        $this->message = $message;
    }

    public function index()
    {
        $chats = $this->chat->with([
            'usersent',
            'userrecive',
            'messages' => function($query){
                $query->latest();
            },
        ])->where('user_sent', auth()->user()->id)
        ->orWhere('user_recive', auth()->user()->id)
        ->get();

        return Inertia::render('Chat/Index', [
            'chats' => $chats
        ]);
    }
}
