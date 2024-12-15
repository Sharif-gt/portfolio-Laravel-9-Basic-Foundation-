<?php

namespace App\Http\Controllers\backend\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\admin\About;
use App\Models\admin\MultiImage;
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

    public function view (){
        return view('backend.pages.home.multiImage');
    }

    public function insert (Request $request){
        $image = $request->file('images');

        foreach ($image as $img) {
            $name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(220,220)->save('upload/multi/'.$name);
            $save = 'upload/multi/'.$name;

            MultiImage::insert([
                'images' => $save,
                'created_at'=> Carbon::now()
            ]);
        }
        session()->flash('message','Update images successfully.');
           return redirect()->back();
    }
}
