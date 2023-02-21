<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login/process', [UserController::class, 'authenticate'])->name('login.auth');

Route::middleware(['auth'])->group(function() {
    Route::controller(StudentController::class)->group(function() {
        Route::get('/', 'index')->name('home');
        Route::get('/student/add', 'add')->name('student.add');
        Route::post('/student/store', 'store')->name('student.store');
        Route::get('/student/{student}/view', 'view')->name('student.view');
        Route::get('/student/{student}/edit', 'edit')->name('student.edit');
        Route::put('/student/{student}', 'update')->name('student.update');
        Route::delete('/student/{student}', 'destroy')->name('student.delete');
    });

    Route::controller(UserController::class)->group(function() {
        Route::get('/student/logout', 'logout')->name('student.logout');
    });
});

