<?php

namespace App\Http\Controllers\backend\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\HomeSlide;
use Image;

class sliderController extends Controller
{
    public function index (){
        $data = HomeSlide::find(1);
        return view('backend.pages.home.slider',compact('data'));
    }

    public function update (Request $request){
        $slide_id = $request->id;

        if ($request->file('image')) {
            $image = $request->file('image');
            $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(636,852)->save('upload/'.$img_name);
            $save_img = 'upload/'.$img_name;

            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video' => $request->video,
                'image' => $save_img,
            ]);
            session()->flash('message','Update slider with image successfully.');
            return redirect()->back();
        }else {
            HomeSlide::findOrFail($slide_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video' => $request->video,
            ]);
            session()->flash('message','Update slider without image successfully.');
            return redirect()->back();
        }
    }
}
