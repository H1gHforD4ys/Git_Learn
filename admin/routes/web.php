<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

/*
|-------------------------------------------------- ------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'viewLogin']);
Route::post('/login',[HomeController::class,'login'])->name('login');

Route::get('/view-register',[HomeController::class,'viewRegister'])->name('view-register');
Route::post('/register',[HomeController::class,'register'])->name('register');

Route::get('/logout',[HomeController::class,'logout'])->name('logout');

Route::get('/home',[HomeController::class,'home']);
Route::get('/product',[productController::class,'index'])->name('product');
Route::Post('/add-product',[ProductController::class,'addProduct'])->name('add-product');

Route::get('/view-edit-product/{id}',[ProductController::class,'viewFormEditProduct']);
Route::post('/edit-product',[ProductController::class,'editProduct'])->name('edit-product');

Route::get('/view-delete-product/{id}',[ProductController::class,'viewDeleteProduct']);
Route::post('/delete-product',[ProductController::class,'deleteProduct'])->name('delete-product');

Route::get('/search',[HomeController::class,'search']);
