<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('homePage');

Route::get('/', [SiteController::class, 'index'])->name('homePage');

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


Route::get('/admin/categories', function () {
    return view('admin.category.category');
})->name('getCategories')->middleware('is_admin');

Route::get('/admin/categories/insert', function () {
    return view('admin.category.categoryInsert');
})->name('insertCategories')->middleware('is_admin');

Route::get('/admin/categories/edit/{id}', function () {
    return view('admin.category.categoryEdit');
})->name('editCategories')->middleware('is_admin');

//Route::get('/category', [App\Http\Controllers\CategoryController::class, 'listCategory'])->name('listCategory');

Route::post('/admin/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'editCategory'])->name('editCategory')->middleware('is_admin');
Route::post('/admin/category/create', [App\Http\Controllers\CategoryController::class, 'createCategory'])->name('createCategory')->middleware('is_admin');
Route::post('/admin/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('deleteCategory')->middleware('is_admin');


Route::get('/admin/products', [ProductController::class, 'index'])->name('product.index')->middleware('is_admin');
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('product.create')->middleware('is_admin');
Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit')->middleware('is_admin');
Route::post('/admin/products', [ProductController::class, 'store'])->name('product.store')->middleware('is_admin');
Route::put('/admin/products/edit/{id}', [ProductController::class, 'update'])->name('product.update')->middleware('is_admin');
Route::delete('/admin/products/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('is_admin');
