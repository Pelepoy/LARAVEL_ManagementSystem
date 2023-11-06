<?php

use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;
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


/*
  COMMON ROUTES NAMING
 * index - Show all data of students
 * show - Show a single data of students
 * create - Show a form to a new user
 * store - Store a data
 * edit - Show a form to a data
 * update - update a data
 * destroy - delete a data
 */
Route::controller(UserController::class)->group(function(){
    Route::get('/register', 'register');
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login/process', 'process');
    Route::post('/store', 'store');
    Route::post('/logout', 'logout');
});

Route::controller(StudentsController::class)->group(function(){
    Route::get('/', 'index')->middleware('auth');
    Route::get('/add/student', 'create');
    Route::post('/add/student', 'store');
    Route::get('/student/{id}', 'show');
    Route::put('/student/{student}', 'update');
    Route::delete('/student/{student}', 'destroy');
});
