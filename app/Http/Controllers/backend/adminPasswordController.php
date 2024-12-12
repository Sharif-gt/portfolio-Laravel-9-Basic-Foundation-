<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class adminPasswordController extends Controller
{
    public function index (){
        return view('backend.pages.password');
    }

    public function update (Request $request){
        $validation = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        $hashPassword = Auth::user()->password;

        if (Hash::check($request->old_password, $hashPassword)) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->new_password);
            $users->save();

            session()->flash('message','Password update successfully');
            return redirect()->back();
        }else {
            session()->flash('message','Old Password is not match');
            return redirect()->back();
        }
       
    }
}
