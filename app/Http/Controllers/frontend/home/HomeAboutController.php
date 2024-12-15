<?php

namespace App\Http\Controllers\frontend\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\About;

class HomeAboutController extends Controller
{
    public function index (){
        $aboutData = About::find(1);
        return view('frontend.home.about',compact('aboutData'));
    }
}
