<?php

namespace App\Http\Controllers\backend\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\About;
use Image;

class AboutController extends Controller
{
    public function index (){
        $aboutData = About::find(1);
        return view('backend.pages.home.homeAbout',compact('aboutData'));
    }

    public function update (Request $request){
        $id = $request->id;

        if ($request->file('image')) {
           $image = $request->file('image');
           $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(523,605)->save('upload/'.$img_name);
           $img_save = 'upload/'.$img_name;

           About::findOrFail($id)->update([
            'title'=> $request->title,
            'short_title'=> $request->short_title,
            'short_description'=> $request->short_description,
            'long_description'=> $request->long_description,
            'image'=> $img_save,
           ]);
           session()->flash('message','Update about with image successfully.');
           return redirect()->back();
        }else {
            About::findOrFail($id)->update([
            'title'=> $request->title,
            'short_title'=> $request->short_title,
            'short_description'=> $request->short_description,
            'long_description'=> $request->long_description,
           ]);
           session()->flash('message','Update about without image successfully.');
           return redirect()->back();
        }
    }
}
