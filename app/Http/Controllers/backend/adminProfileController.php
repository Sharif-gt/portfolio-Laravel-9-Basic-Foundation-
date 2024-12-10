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
}
