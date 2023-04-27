<?php

use App\Http\Controllers\ProfileController;
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
    return view('LandingPage');
});

Route::get('/chat', function () {
    return view('user.pages.chat');
});

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/ormawa', function () {
    return view('user.pages.ormawa');
});

Route::get('/dashboard', function () {
    return view('user.pages.dashboard');
})->middleware(['auth', 'verified', 'role:mahasiswa'])->name('dashboard');

Route::get('/post', function () {
    return view('user.pages.post');
})->middleware(['auth', 'verified', 'role:mahasiswa'])->name('post');

Route::get('/admin', function () {
    return view('admin.layouts.admin');
})->middleware(['auth', 'verified', 'role:admin'])->name('admin.admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
