<?php

namespace App\Http\Controllers\frontend\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\blog;
use App\Models\admin\MultiImage;
use App\Models\admin\Category;

class HomeBlogController extends Controller
{
    public function index ($id){
        $data = blog::findOrFail($id);
        $images = MultiImage::get()->all();
        $blog = blog::latest()->limit(6)->get();
        $category = Category::latest()->limit(7)->get();
        return view('frontend.home.blog-details',compact('data','images','blog','category'));
    }

    public function catblog ($id){
        $categoryBlog = blog::where('categorie_id',$id)->orderBy('id','DESC')->get();
        $categoryName = Category::findOrFail($id);
        $images = MultiImage::get()->all();
        $blog = blog::latest()->limit(6)->get();
        $category = Category::latest()->limit(7)->get();
        
        return view('frontend.home.category-blog',compact('categoryBlog','categoryName','images','blog','category'));
    }

    public function allablog (){
        $images = MultiImage::get()->all();
        $allBlogs = blog::latest()->orderBy('id','DESC')->get();
        $blog = blog::latest()->limit(6)->get();
        $category = Category::latest()->limit(7)->get();

        return view('frontend.home.all-blogs',compact('images','allBlogs','blog','category'));
    }
}
