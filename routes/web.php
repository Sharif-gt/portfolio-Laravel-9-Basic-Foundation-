<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\adminController;
use App\Http\Controllers\backend\adminProfileController;
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
    // Route::patch('/profile', [adminProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [adminProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
