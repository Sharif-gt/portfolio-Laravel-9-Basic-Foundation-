<?php

namespace App\Http\Controllers\backend\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\MultiImage;
use Image;


class MultiImageController extends Controller
{
    public function index (){
        $images = MultiImage::get()->all();
        return view('backend.pages.home.multiImageView',compact('images'));
    }

    public function view ($id){
        $imageEdit = MultiImage::findOrFail($id);
        return view('backend.pages.home.multiImageEdit',compact('imageEdit'));
    }

    public function update (Request $reques){

        $id = $reques->id;
        if ($reques->file('images')) {
            $image = $reques->file('images');
            $name_img = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(220,220)->save('upload/multi/'.$name_img);
            $save = 'upload/multi/'.$name_img;

            MultiImage::findOrFail($id)->update([
                'images' => $save,
            ]);
            session()->flash('message','Update image successfully.');
           return redirect()->route('multi.images');
        }
    }
}
