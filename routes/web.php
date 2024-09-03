<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('home');
});

Route::get('/base', function () {
    return view('base.base');
});

Route::get('/welcome', function () {
    return view('welcome');
});

// Return view page hello
Route::get('/hello', function() {
    return view('hello');
});

// Cara lain bisa pakai view()
// Route::view('/hello', 'hello');

// Cara lain untuk mereturnkan sebuah text tanpa membuat page baru
Route::get('halo', function() {
    return "Ini return dari route tanpa view";
});

// Untuk memanggil class controller
Route::get('hello/index', [FirstController::class,'index']);

// Route Parameter 1
Route::get('hello/index2/{param}', [FirstController::class,'index2']);

// Route Parameter 2 (Opsional)
Route::get('hello/index3/{param?}', [FirstController::class,'index3']);

// Route Parameter 3 (1 wajib - 1 opsional)
Route::get('hello/index4/{param1}/{param2?}', [FirstController::class,'index4']);

Route::get('/home/{param1?}/{param2?}', [HomeController::class, 'index'])->name('home');

Route::get('/about/{param1?}/{param2?}', [HomeController::class, 'about'])->name('about');

Route::get('/post/{param1?}/{param2?}', [HomeController::class, 'post'])->name('post');

Route::get('/tail', function(){
    return view('tail');
});

Route::get('/home', function(){
    return view('home');
});