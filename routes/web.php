<?php

use App\Http\Controllers\Layout;
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

// Route::get('/', function () {
//     return view('app');
// });

Route::get('/', [Layout::class, 'home']);

Route::controller(layout::class)->group(function(){
    Route::get('/layout/home', 'home');
    Route::get('/layout/index', 'index');
});

Route::get('/home', function () {
    return view('LandingPage');
});