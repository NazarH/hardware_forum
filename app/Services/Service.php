<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Themes;
use App\Models\Topic;
use App\Models\Topic_messages;

class Service
{
    /* MainPageController */

    public function create_post($request, $id){
        $new_topic = Topic::create([
            'theme_id' => $id,
            'topic_name' => $request['title'],
            'user_name' => Auth::user()->name
        ]);
        Topic_messages::create([
            'theme_id'=> $id,
            'topic_id'=> $new_topic->id,
            'user_id' => Auth::user()->id,
            'message' => $request['text'],
        ]);
        $theme = Themes::where('id', $id)->first();
        $theme->posts += 1;
        $theme->messages += 1;
        $theme->save();
    }

    public function message_create(){
        Topic_messages::create([
            'theme_id'=> $id,
            'topic_id'=> $topic_id,
            'user_id' => Auth::user()->id,
            'message' => $request['text']
        ]);
        $topic = Topic::where('id', $topic_id)->first();
        $topic->answers += 1;
        $topic->save();
        $theme = Themes::where('id', $id)->first();
        $theme->messages += 1;
        $theme->save();
    }

    /* AdminController */

    public function forums_create($request){
        Themes::create([
            'name' => $request['name'],
            'short_desc' => $request['short_desc']
        ]);
    }

    public function posts_delete($id){
        Topic_messages::where('topic_id', $id)->delete();
        Topic::where('id', $id)->delete();
    }

    public function forums_delete($id){
        Topic_messages::where('theme_id', $id)->delete();
        Topic::where('theme_id', $id)->delete();
        Themes::where('id', $id)->delete();
    }

    /* MailboxController */

    public function message_send($request, $id){
        Message::create([
            'sender_id' => Auth::user()->id,
            'receiver_id' => $id,
            'theme' => $request['theme'],
            'text' => $request['text']
        ]);
    }

    public function message_delete($request){
        $arr = str_split($request['ids']);
        foreach($arr as $id){
            Message::where('id', $id)->delete();
        }
    }

    /* ProfileController */

    public function profile_edit($request, $id){
        if ($request->file('image') !== null) {
            $path = $request->file('image')->store('users', 'public');
            Avatar::create([
                'user_id' => Auth::user()->id,
                'link' => $path
            ]);
        }
        $user = User::where('id', $id)->first();
        $user->configuration = $request['configuration'];
        $user->update();
    }
}
