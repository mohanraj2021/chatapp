<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\NewChatMessage;


class ChatController extends Controller
{
    public function room(){
        return ChatRoom::all();
    }

    public function message(Request $request, $roomId){
         return ChatMessage::where('chat_room_id', $roomId)
            ->with('user')
            ->orderBy('created_at','DESC')
            ->get();
        
    }

    public function newMessage(Request $request, $roomId){
        $newmessage = new ChatMessage();
        $newmessage->user_id = Auth::id();
        $newmessage->chat_room_id = $roomId;
        $newmessage->message = $request->message;
        $newmessage->save();

        broadcast(new NewChatMessage( $newmessage))->toOthers();

        return $newmessage;

    }
}
