<?php

namespace App\Http\Controllers\backend\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Portfolio;
use Image;

class PortfolioController extends Controller
{
    public function index (){
        return view('backend.pages.portfolio.add-portfolio');
    }

    public function add (Request $request){
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'long_description' => 'required',
        ]);

        $image = $request->file('image');
        $name_img = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1020,519)->save('upload/portfolio/'.$name_img);
        $save_img = 'upload/portfolio/'.$name_img;

        Portfolio::insert([
            'name'=> $request->name,
            'title'=> $request->title,
            'long_description'=> $request->long_description,
            'image'=> $save_img,
        ]);
        session()->flash('message','Portfolio Add Successfully.');
        return redirect()->route('portfolio.all');
    }

    public function view (){

        $data = Portfolio::latest()->get();
        return view('backend.pages.portfolio.portfolio-all',compact('data'));
    }
}
