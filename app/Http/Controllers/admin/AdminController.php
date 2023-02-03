<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Message;
use App\Models\Themes;
use App\Models\Topic;
use App\Models\Topic_messages;

class AdminController extends BaseController
{
    public function index(){
        return view('admin.index');
    }

    public function forums(){
        $forums = Themes::paginate(14);
        return view('admin.forums', compact('forums'));
    }
    public function forums_create(Request $request){
        $this->service->forums_create($request);
        return redirect(asset('/admin/forums'));
    }

    public function posts(){
        $topics = Topic::paginate(20);
        return view('admin.posts', compact('topics'));
    }
    public function posts_delete($id){
        $this->service->posts_delete($id);
        return redirect(asset('/admin/posts'));
    }

    public function messages(){
        $messages = Topic_messages::paginate(20);
        return view('admin.messages', compact('messages'));
    }
    public function messages_delete($id){
        Topic_messages::where('id', $id)->delete();
        return redirect(asset('/admin/messages'));
    }

    public function users(){
        $users = User::paginate(20);
        return view('admin.users', compact('users'));
    }
    public function users_delete($id){
        User::where('id', $id)->delete();
        return redirect(asset('/admin/users'));
    }

    public function users_m(){
        $messages = Message::paginate(20);
        return view('admin.users-messages', compact('messages'));
    }
    public function users_m_delete($id){
        Message::where('id', $id)->delete();
        return redirect(asset('/admin/users-messages'));
    }

    public function forums_delete($id){
        $this->service->forums_delete($id);
        return redirect(asset('/admin/forums'));
    }
}
