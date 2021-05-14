<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Session;
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

// Route for login at URL
Route::get('/login', function () {
    return view('login'); //redirect to login page
});
Route::get('/logout', function () {
    Session::forget('user');
    return view('login'); //redirect to login page
});
Route::view('/register', 'register');
Route::post('/register', [UserController::class, 'registerUser']);
Route::post('/login', [UserController::class, 'login']); //take response from login page
Route::get('/home', [ProductController::class, 'index']); //Redirect to home page when login is successful
Route::get('/details/{id}', [ProductController::class, 'detail']); //Details page products
Route::get('/search',[ProductController::class, 'search']); //
Route::post('/addcart', [ProductController::class, 'addToCard']);
Route::get('/cartlist', [ProductController::class, 'getCardList']);
Route::get('/deletelist/{id}', [ProductController::class, 'deleteList']);
Route::get('/ordernow', [ProductController::class, 'orderNow']);
Route::post('/orderplace', [ProductController::class, 'orderPlace']);
Route::get('/myorders', [ProductController::class, 'myOrders']);

