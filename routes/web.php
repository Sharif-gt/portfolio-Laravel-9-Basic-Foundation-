<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\adminController;
use App\Http\Controllers\backend\adminProfileController;
use App\Http\Controllers\backend\adminPasswordController;
use App\Http\Controllers\backend\home\sliderController;
use App\Http\Controllers\backend\home\AboutController;
use App\Http\Controllers\frontend\home\HomeAboutController;
use App\Http\Controllers\frontend\home\HomePortfolioController;
use App\Http\Controllers\frontend\home\HomeBlogController;
use App\Http\Controllers\backend\home\MultiImageController;
use App\Http\Controllers\backend\home\PortfolioController;
use App\Http\Controllers\backend\home\BlogCategoryController;
use App\Http\Controllers\backend\home\BlogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// admin controller
Route::middleware('auth')->group(function () {
    Route::get('/logout', [adminController::class, 'destroy'])->name('logout');
    
});

// admin profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [adminProfileController::class, 'index'])->name('profile.view');
    Route::get('/edit', [adminProfileController::class, 'edit'])->name('edit.profile');
    Route::post('/update', [adminProfileController::class, 'update'])->name('update.profile');
});
// admin password
Route::controller(adminPasswordController::class)->group(function(){
     Route::get('/password', 'index')->name('password');
     Route::post('/update/password', 'update')->name('update.password');
});
// Multi images
Route::controller(MultiImageController::class)->group(function (){
    Route::get('/multi/images','index')->name('multi.images');
    Route::get('/image/edit/{id}','view')->name('edit.image');
    Route::post('/update/multi/image','update')->name('update.multi.image');
    Route::get('/image/delete/{id}','delete')->name('delete.image');
});
// Portfolio
Route::controller(PortfolioController::class)->group(function (){
    Route::get('/add/portfolio','index')->name('add.portfolio');
    Route::post('/portfolio/add','add')->name('portfolio.add');
    Route::get('/portfolio/all','view')->name('portfolio.all');
    Route::get('/edit/portfolio/{id}','edit')->name('edit.portfolio');
    Route::post('/update/portfolio/','update')->name('update.portfolio');
    Route::get('/delete/portfolio/{id}','delete')->name('delete.portfolio');
});

Route::controller(HomePortfolioController::class)->group(function (){
    Route::get('/portfolio/details/{id}','view')->name('portfolio.details');
});

// Blog category
Route::controller(BlogCategoryController::class)->group(function (){
    Route::get('/category/all','view')->name('all.category');
    Route::get('/category/add','add')->name('add.category');
    Route::post('/add/category','create')->name('category.add');
    Route::get('/edit/category/{id}','edit')->name('edit.category');
    Route::post('/update/category/{id}','update')->name('update.category');
    Route::get('/delete/category/{id}','delete')->name('delete.category');
});

// Blog
Route::controller(BlogController::class)->group(function (){
    Route::get('/blog/all','view')->name('all.blog');
    Route::get('/blog/add','add')->name('add.blog');
    Route::post('/create/blog','create')->name('create.blog');
    Route::get('/edit/blog/{id}','edit')->name('edit.blog');
    Route::post('/update/blog/{id}','update')->name('update.blog');
    Route::get('/delete/blog/{id}','delete')->name('delete.blog');
});

// Home section
// Slider
Route::controller(sliderController::class)->group(function (){
    Route::get('/slider','index')->name('slider');
    Route::post('/update/slider','update')->name('update.slider');
});
// About
Route::controller(AboutController::class)->group(function (){
    Route::get('/home/about','index')->name('home.about');
    Route::post('/update/about','update')->name('update.about');
    Route::get('/home/multi-image','view')->name('multi.image');
    Route::post('/home/multi-image/update','insert')->name('about.image');
});
//About page
Route::controller(HomeAboutController::class)->group(function(){
    Route::get('about','index')->name('about');
});

//blog page
Route::controller(HomeBlogController::class)->group(function(){
    Route::get('blog/details/{id}','index')->name('blog.details');
    Route::get('category/blog/{id}','catblog')->name('category.blog');
    Route::get('all/blogs','allablog')->name('blogs.all');
});

require __DIR__.'/auth.php';
