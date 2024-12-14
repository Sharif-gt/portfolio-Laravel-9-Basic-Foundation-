<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\adminController;
use App\Http\Controllers\backend\adminProfileController;
use App\Http\Controllers\backend\adminPasswordController;
use App\Http\Controllers\backend\home\sliderController;
use App\Http\Controllers\backend\home\AboutController;
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
});

require __DIR__.'/auth.php';
