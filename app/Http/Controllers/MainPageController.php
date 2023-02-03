<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Themes;
use App\Models\Topic;
use App\Models\Topic_messages;

class MainPageController extends BaseController
{
    public function index(){
        $forums = Themes::all();
        $posts_count = Themes::all()->sum('posts');
        $posts_messages = Themes::all()->sum('messages');
        $user_count = count(User::all());
        $last_user = User::where('id', User::max('id'))->get();
        return view('home.index', compact('last_user', 'user_count', 'forums', 'posts_count', 'posts_messages'));
    }

    public function viewforum($id){
        $forum_id = $id;
        $forum_name = Themes::where('id', $id)->first()->name;
        $topics = Topic::where('theme_id', $id)->paginate(1);
        return view('viewforum.index', compact('forum_id', 'forum_name', 'topics'));
    }

    public function viewforum_search(Request $request, $id){
        if($request['search'] === null){
            $topics = null;
            $messages = null;
        } else {
            $topics = Topic::where('topic_name', 'like', '%'.$request['search'].'%')->get();
            $messages = Topic_messages::where('message', 'like', '%'.$request['search'].'%')->get();
        }
        $forum_id = $id;
        $forum_name = Themes::where('id', $id)->first()->name;
        return view('viewforum.search', compact('forum_id', 'forum_name', 'topics', 'messages'));
    }

    public function posting($id){
        $forum = Themes::where('id', $id)->get();
        return view('viewforum.form', compact('forum'));
    }

    public function create_post(Request $request, $id){
        $this->service->create_post($request, $id);
        return redirect(asset('/viewforum/forum-'.$id));
    }

    public function viewtopic($id, $topic_id){
        $topic = Topic::where('id', $topic_id)->first();
        $messages = Topic_messages::where('topic_id', $topic_id)->paginate(1);
        return view('viewtopic.index', compact('topic', 'messages', 'id', 'topic_id'));
    }

    public function message_create(Request $request, $id, $topic_id){
        $this->service->message_create($request, $id, $topic_id);
        return redirect(asset('/viewforum/forum-'.$id.'/topic-'.$topic_id));
    }
}
