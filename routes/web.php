<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return view('welcome');
});
Route::get('/',[HomeController::class,'index']);
Route::middleware(['auth'])->group(function () {
    Route::resource('/about', AboutController::class);
    Route::resource('/contact', ContactController::class);
    Route::resource('/category', CategoryController::class);
    Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('delete');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users=User::all();
    return view('dashboard',compact('users'));

})->name('dashboard');
