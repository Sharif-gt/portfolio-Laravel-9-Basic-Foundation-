<?php

namespace App\Http\Controllers\backend\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Portfolio;

class PortfolioController extends Controller
{
    public function index (){
        return view('backend.pages.portfolio.add-portfolio');
    }
}
