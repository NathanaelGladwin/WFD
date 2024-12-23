<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\HomeController;
use App\Models\Course;

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

// Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');

// Route::get('/course/create', [CourseController::class, 'create'])->name('course.create')->withoutMiddleware('check');

// Route::get('/course/create', [CourseController::class, 'create'])->name('course.create')->middleware('check');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function(): void{

    Route::middleware(['role:LECTURER,DEAN,STUDENT'])->group(function(){
        Route::get('/courses', function(){
        return view('courses', ['courses'=>Course::all()]);
        })->name('courses');
        Route::get('/course/view/{course:id}', [CourseController::class, 'show']);
    });

    Route::middleware(['role:LECTURER,DEAN'])->group(function(){
        Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
        Route::get('course/edit/{course:id}', [CourseController::class, 'edit'])->name('course.edit');
        Route::post('course/insert', [CourseController::class, 'insert'])->name('course.insert');
        Route::put('course/update/{course:id}', [CourseController::class, 'update'])->name('course.update');
        Route::get('/course/delete/{course:id}', [CourseController::class, 'edit'])->name('course.delete');
    });
});

Route::get('/request/to/api/course/{id}', [CourseController::class, 'request_api_to_course']);

// Route::get('course/edit/{course:id}', [CourseController::class, 'edit'])->name('course.edit');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login_auth', [AuthController::class, 'login_auth'])->name('login_post');