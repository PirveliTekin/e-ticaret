<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\BrandController;
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
    Route::get('/category/restore/{id}',[CategoryController::class,'restore'])->name('restore');
    Route::get('/category/forceDelete/{id}',[CategoryController::class,'forceDelete'])->name('forceDelete');
});
Route::middleware(['auth'])->group(function () {

    Route::resource('/brand', BrandController::class);
    Route::get('/brand/delete/{id}', [BrandController::class,'delete'])->name('brandDelete');
    Route::get('/multi/image', [BrandController::class,'multipic'])->name('multipic');
    Route::get('/multi/add', [BrandController::class,'multipicAdd'])->name('multipicAdd');


});
Route::middleware(['auth'])->group(function () {
    Route::resource('/admin', IndexController::class);
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users=User::all();
    return view('dashboard',compact('users'));
    //return view('admin.index');

})->name('dashboard');
Route::get('/logout',[BrandController::class,'Logout'])->name('userLogout');
