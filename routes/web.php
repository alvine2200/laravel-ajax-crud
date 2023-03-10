<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('students', [StudentController::class, 'index']);
Route::post('students', [StudentController::class, 'create']);
Route::get('fetch/students', [StudentController::class, 'fetch']);
Route::get('edit/student/{id}', [StudentController::class, 'edit']);
Route::delete('delete/student/{id}', [StudentController::class, 'delete']);
Route::put('update/student/{id}', [StudentController::class, 'update']);
