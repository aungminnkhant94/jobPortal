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

Route::get('/jobs',[App\Http\Controllers\JobController::class,'index']);
Route::get('/jobs/detail/{id}',[App\Http\Controllers\JobController::class,'detail']);
Route::get('/user/profile',[App\Http\Controllers\UserController::class,'index']);
Route::post('/user/profile/store',[App\Http\Controllers\UserController::class,'store'])->name('profile.store');

Route::get('/companies/detail/{id}',[App\Http\Controllers\CompanyController::class,'detail'])->name('companies.detail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
