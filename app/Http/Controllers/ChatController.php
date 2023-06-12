<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $user = Auth::user();
        $messages = Chat::all();

        return view('adminpanel.communication',['user'=>$user,'message'=>$messages]);
    }


    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }

//    public function index()
//    {
//        return view('adminpanel.communication');
//    }
//
//
//    public function create()
//    {
//        //
//    }
//
//
    public function storeMessage(Request $request)
    {

        $validate = $request->validate([
           'message'=>'required|string|max:255',
           'user_id'=>'required|numeric|exists:users,id'
        ]);



        Auth::user()->chats()->create($validate);

//        Chat::create($validate);

        return back();
    }
//
//
//    public function show(Chat $chat)
//    {
//        //
//    }
//
//
//    public function edit(Chat $chat)
//    {
//        //
//    }
//
//
//    public function update(Request $request, Chat $chat)
//    {
//        //
//    }
//
//
//    public function destroy(Chat $chat)
//    {
//        //
//    }
}
