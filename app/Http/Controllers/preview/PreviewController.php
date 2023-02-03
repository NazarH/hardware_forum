<?php

namespace App\Http\Controllers\preview;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class PreviewController extends BaseController
{
    public function index(){
        return view("preview.index");
    }
}
