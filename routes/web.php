<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ResetPasswordController;
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

Route::get('/', function () {
    return view('welcome');
})->name('homePage');

Route::get('/login', function () {
    return view('auth/login');
})->name('loginPage');

Route::get('/user/{id}', function () {
    return view('profile');
})->name('profile');

Route::get('/user/delete/{id}', function () {
    return view('deleteProfile');
})->name('deleteProfile');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::post('reset/password/', [ResetPasswordController::class, 'resetPassword'])->name('reset');
Route::post('/signup', [App\Http\Controllers\UserController::class, 'create'])->name('signup');
Route::post('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'editProfileUser'])->name('editProfile');
Route::post('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'deleteProfileUser'])->name('deleteUser');


Route::get('/categories', function () {
    return view('category');
})->name('getCategories');

Route::get('/categories/insert', function () {
    return view('categoryInsert');
})->name('insertCategories');

Route::get('/categories/edit/{id}', function () {
    return view('categoryEdit');
})->name('editCategories');

//Route::get('/category', [App\Http\Controllers\CategoryController::class, 'listCategory'])->name('listCategory');

Route::post('/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'editCategory'])->name('editCategory');
Route::post('/category/create', [App\Http\Controllers\CategoryController::class, 'createCategory'])->name('createCategory');
Route::post('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('deleteCategory');



