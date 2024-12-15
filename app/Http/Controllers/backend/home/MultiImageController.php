<?php

namespace App\Http\Controllers\backend\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\MultiImage;

class MultiImageController extends Controller
{
    public function index (){
        $images = MultiImage::get()->all();
        return view('backend.pages.home.multiImageView',compact('images'));
    }
}
