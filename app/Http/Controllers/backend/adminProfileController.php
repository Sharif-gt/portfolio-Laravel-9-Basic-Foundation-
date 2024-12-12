<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class adminProfileController extends Controller
{
    public function index (){
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('backend.pages.profile',compact('data'));
    }
    
    public function edit (){
        $id = Auth::user()->id;
        $data = User::find($id);
        return view('backend.pages.profile_edit',compact('data'));
    }
    
    public function update (Request $request){

        $id = Auth::user()->id;
        $updateData = User::find($id);
        $updateData->name = $request->name;
        $updateData->email = $request->email;

        if ($request->file('image')) {
           $image = $request->file('image');
           $imageName = date('Ymdhi').$image->getClientOriginalName();
           $image->move(public_path('admin_pic'),$imageName);
           $updateData['image'] = $imageName;
        }
        $updateData->save();
        session()->flash('message','Profile Update Successfully');

        return redirect()->route('profile.view');
    }
}
