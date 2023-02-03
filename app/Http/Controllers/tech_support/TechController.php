<?php

namespace App\Http\Controllers\tech_support;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class TechController extends BaseController
{
    public function index(){
        $form = "page.tech.form";
        return view("tech_support.index", compact("form"));
    }

    public function form(){
        return view("tech_support.form");
    }
}
