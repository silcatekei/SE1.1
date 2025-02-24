<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
*/

//Route::get('/', function () {
//    return view('index'); // Display the 'index.blade.php' view
//});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/posts/{id}', [PostController::class, 'show']);
