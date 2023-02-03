<?php

namespace App\Http\Controllers\mailbox;

use App\Http\Controllers\BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Message;

class MailboxController extends BaseController
{
    public function index(){
        $sender = Message::where('sender_id', Auth::user()->id)->get();
        $receiver = Message::where('receiver_id', Auth::user()->id)->get();
        return view('mailbox_pm.index', compact('sender', 'receiver'));
    }
    
    public function index_message($id){
        $user = User::where('id', $id)->first();
        return view('mailbox_pm.send', compact('user'));
    }

    public function message_send(Request $request, $id){
        $this->service->message_send($request, $id);
        return redirect(asset('/profile/id-'.$id));
    }

    public function show_message($id){
        $message = Message::where('id', $id)->first();
        return view('mailbox_pm.show', compact('message'));
    }

    public function message_delete(Request $request){
        $this->service->message_delete($request);
        return redirect(asset('/mailbox'));
    }
}
