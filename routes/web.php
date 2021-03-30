<?php

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

Route::view('/register', 'register');
Route::post('/register', 'RegisterUser');
Route::view('/', 'login');
Route::post('/login', 'LoginUser');
Route::view('/profile', 'profile')->middleware('auth');