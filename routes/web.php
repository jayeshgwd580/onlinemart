<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ProductUIController;
use App\Http\Controllers\CartController;


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

Route::get('/', [AuthController::class,'home'])->name('home');
Route::get('/login',[AuthController::class,'loginPage'])->name('login');
Route::post('/login',[AuthController::class,'login']);
Route::get('/register',[AuthController::class,'registerPage'])->name('register');
Route::post('/register',[AuthController::class,'register']);
Route::get('/user',[AuthController::class,'userPage'])->name('user');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');


Route::get('/admin/users',[AdminUserController::class,'index']);
Route::get('/admin/users/create',[AdminUserController::class,'create']);
Route::post('/admin/users/store',[AdminUserController::class,'store']);
Route::get('/admin/users/edit/{id}',[AdminUserController::class,'edit']);
Route::post('/admin/users/update/{id}',[AdminUserController::class,'update']);
Route::get('/admin/users/delete/{id}',[AdminUserController::class,'delete']);

Route::get('/products/editproduct/{id}',[ProductUIController::class,'edit']);
Route::post('/products/update/{id}',[ProductUIController::class,'update']);
Route::get('/products/delete/{id}',[ProductUIController::class,'delete']);
Route::get('/product/create',[ProductUIController::class,'create']);
Route::post('/product/store',[ProductUIController::class,'store']);


Route::middleware('auth')->group(function(){
    // Add to cart
    Route::post('/cart/add', [CartController::class,'addToCart'])->name('cart.add');

    // List cart items
    Route::get('/cart', [CartController::class,'listCart'])->name('cart.list');

    // Delete cart item
    Route::delete('/cart/delete/{id}', [CartController::class,'deleteCart'])->name('cart.delete');
});