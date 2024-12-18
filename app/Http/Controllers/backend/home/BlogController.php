<?php

namespace App\Http\Controllers\backend\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\admin\blog;
use App\Models\admin\Category;
use Image;

class BlogController extends Controller
{
    public function view (){
        $data = blog::latest()->get();
        return view('backend.pages.blog.blog-all',compact('data'));
    }

    public function add (){
        $category = Category::orderBy('name','ASC')->get();
        return view('backend.pages.blog.add-blog',compact('category'));
    }

    public function create (Request $request){
        $request->validate([
            'name' => 'required',
            'categorie_id' => 'required',
            'long_description' => 'required',
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $name_img = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1020,519)->save('upload/blog/'.$name_img);
        $save_img = 'upload/blog/'.$name_img;

        blog::insert([
            'name'=> $request->name,
            'categorie_id'=> $request->categorie_id,
            'long_description'=> $request->long_description,
            'tag'=> $request->tag,
            'image'=> $save_img,
            'created_at' => Carbon::now(),
        ]);
        session()->flash('message','Create blog Successfully.');
        return redirect()->route('all.blog');
    }

    public function edit ($id){
        $data = blog::findOrFail($id);
        $category = Category::orderBy('name','ASC')->get();
        return view('backend.pages.blog.edit-blog',compact('data','category'));
    }

    public function update (Request $request, $id){
        if (($request->file('image'))) {
            $image = $request->file('image');
            $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1020,519)->save('upload/blog/'.$img_name);
            $save_img = 'upload/blog/'.$img_name;

        blog::findOrFail($id)->update([
            'name'=> $request->name,
            'categorie_id'=> $request->categorie_id,
            'long_description'=> $request->long_description,
            'tag'=> $request->tag,
            'image'=> $save_img,
        ]);

        session()->flash('message','Blog Update Successfully.');
        return redirect()->route('all.blog');
        }else {
            blog::findOrFail($id)->update([
            'name'=> $request->name,
            'categorie_id'=> $request->categorie_id,
            'long_description'=> $request->long_description,
            'tag'=> $request->tag,
        ]);

        session()->flash('message','Blog Update Successfully.');
        return redirect()->route('all.blog');
        }
    }

    public function delete ($id){
        $image = blog::findOrFail($id);
        $img = $image->image;
        Unlink($img);

        blog::findOrFail($id)->delete();

        session()->flash('message','Blog Deleted Successfully.');
        return redirect()->route('all.blog');
    }
}
