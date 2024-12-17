<?php

namespace App\Http\Controllers\frontend\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Portfolio;

class HomePortfolioController extends Controller
{
    public function view ($id){
        $data = Portfolio::findOrFail($id);
        return view('frontend.home.portfolio-details',compact('data'));
    }
}
