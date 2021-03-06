<?php


use App\Http\Controllers\Admin\AboutAdminController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ReaderxmlController;
use App\Http\Controllers\Admin\SliderController;
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
/**
 * Frontend Controller
 *
 */
Route::get('/', [HomeController::class, 'index'])->name('anasayfa');

/**
 * Admin Controller
 *
 */
Route::middleware(['auth'])->group(function () {
    Route::resource('/aboutadmin', AboutAdminController::class);
    Route::get('/aboutadmin/delete/{id}', [AboutAdminController::class,'delete'])->name('aboutDelete');
    Route::resource('/admin.contact', ContactController::class);
    Route::resource('/category', CategoryController::class);
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    Route::get('/category/restore/{id}', [CategoryController::class, 'restore'])->name('restore');
    Route::get('/category/forceDelete/{id}', [CategoryController::class, 'forceDelete'])->name('forceDelete');
    Route::resource('/brand', BrandController::class);
    Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brandDelete');
    Route::get('/multi/image', [BrandController::class, 'multipic'])->name('multipic');
    Route::get('/multi/add', [BrandController::class, 'multipicAdd'])->name('multipicAdd');
    Route::resource('/slider', SliderController::class);
    Route::get('/slider/delete/{id}', [SliderController::class, 'delete'])->name('sliderDelete');
    Route::resource('/admincontact',AdminContactController::class);
    Route::get('/admincontact/delete/{id}',[AdminContactController::class,'delete'])->name('adminContactDelete');
    Route::get('/messages',[AdminContactController::class,'messageContact'])->name('messageContact');
    Route::get('/messagesDelete/{id}',[AdminContactController::class,'messagedelete'])->name('messageDelete');
    Route::resource('/readerxml',ReaderxmlController::class);

});
Route::resource('/contact',ContactController::class);
Route::middleware(['auth'])->group(function () {
    Route::resource('/admin', IndexController::class);
    //Change Password and User Profile Show
    Route::get('/changepassword',[ChangePasswordController::class,'index'])->name('change.password');
    Route::post('/password/update',[ChangePasswordController::class,'updatePass'])->name('update.password');
    Route::get('/myProfileEdit',[ChangePasswordController::class,'myProfile'])->name('myProfile');
    Route::get('/myProfile/update/{id}',[ChangePasswordController::class,'updateProfile'])->name('update.profile');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();
    //return view('dashboard',compact('users'));
    return view('admin.index');

})->name('dashboard');
Route::get('/logout', [BrandController::class, 'Logout'])->name('userLogout');
