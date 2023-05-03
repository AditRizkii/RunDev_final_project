<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

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
})->name('home');

Route::resource("/student", StudentController::class);



Route::get('/home', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/post', function () {
        return view('user.pages.post');
    })->name('post');

    Route::get('/dashboard', function () {
        return view('user.pages.dashboard');
    })->name('dashboard');

    Route::get('/ormawa', function () {
        return view('user.pages.ormawa');
    })->name('ormawa');

    Route::get('/kirim-surat', function () {
        return view('user.pages.kirim-surat');
    })->name('kirim-surat');

    Route::get('/chat', function () {
        return view('user.pages.chat');
    })->name('chat');

    Route::get('/forum', function () {
        return view('user.pages.forum');
    })->name('forum');
});

Route::middleware(['auth', 'verified', 'role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/',[IndexController::class,'index'])->name('index');
    // Route::get('/role',[RoleController::class,'index'])->name('role');
    Route::resource('/roles',RoleController::class);
    Route::resource('/permissions',PermissionController::class);
}); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
