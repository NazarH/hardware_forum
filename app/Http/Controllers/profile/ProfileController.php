<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Avatar;

class ProfileController extends BaseController
{
    public function index($id){
        $user = User::where("id", $id)->get();
        return view('profile.index', compact('user'));
    }

    public function profile_edit(Request $request, $id){
        $this->service->profile_edit($request, $id);
        return redirect(asset('/profile/id-'.$id));
    }
}
