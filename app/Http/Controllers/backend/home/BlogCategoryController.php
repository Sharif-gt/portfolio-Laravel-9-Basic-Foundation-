<?php

namespace App\Http\Controllers\backend\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\admin\Category;

class BlogCategoryController extends Controller
{
    public function view (){
        $data = Category::latest()->get();
        return view('backend.pages.blog.all-category',compact('data'));
    }

    public function add (){
        return view('backend.pages.blog.add-category');
    }

    public function create (Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        Category::insert([
            'name'=> $request->name,
            'created_at' => Carbon::now(),
        ]);
        session()->flash('message','Add Category Successfully.');
        return redirect()->route('all.category');
    }

    public function edit ($id){
        $data = Category::findOrFail($id);
        return view('backend.pages.blog.edit-category',compact('data'));
    }

    public function update (Request $request, $id){
        Category::findOrFail($id)->update([
            'name' => $request->name,
        ]);

        session()->flash('message','Category Update Successfully.');
        return redirect()->route('all.category');
    }

    public function delete ($id){
        Category::findOrFail($id)->delete();

        session()->flash('message','Category Deleted Successfully.');
        return redirect()->route('all.category');
    }
}
