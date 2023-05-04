<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;

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



Route::get('/home', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/post',function ()
    {
        return view('user.pages.post.create');
    })->name('post');
    // Route::get('/post/test', [PostController::class, 'show'])->name('post.show');
    Route::post('/post/upload', [PostController::class, 'store'])->name('post.upload');

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
    Route::post('/roles/{role}/permissions',[RoleController::class,'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}',[RoleController::class,'revokePermission'])->name('roles.permissions.revoke');

    Route::resource('/permissions',PermissionController::class);
    Route::post('/permissions/{permission}/roles',[PermissionController::class,'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}',[PermissionController::class,'removeRole'])->name('permissions.roles.remove');

    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::get('/users/{user}',[UserController::class,'show'])->name('users.show');
    Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles',[UserController::class,'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}',[UserController::class,'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions',[UserController::class,'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}',[UserController::class,'revokePermission'])->name('users.permissions.revoke');
}); 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
