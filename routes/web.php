<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [UserController::class, 'signup'])->name('signup');
Route::post('/', [UserController::class, 'signup_valid'])->name('signup_valid');
Route::get('/signin', [UserController::class, 'signin'])->name('signin');
Route::post('/signin', [UserController::class, 'signin_valid'])->name('signin_valid');

Route::get('/signin_adm', [AdminController::class, 'signin'])->name('signin_adm');
Route::post('/signin_adm', [AdminController::class, 'signin_valid'])->name('signin_adm_valid');


Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], function() {
    
Route::get('/applications_adm', [AdminController::class, 'applications'])->name('applications_adm');
Route::get('/accept/{id}', [AdminController::class, 'accept'])->name('accept');
Route::get('/decline/{id}', [AdminController::class, 'decline'])->name('decline');
Route::post('/edit_app', [AdminController::class, 'edit_app'])->name('edit_app');
Route::get('/filt_desc_adm', [AdminController::class, 'desc'])->name('desc_adm');
Route::get('/filt_asc_adm', [AdminController::class, 'asc'])->name('asc_adm');
});

Route::group(['namespace' => 'User', 'middleware' => 'user'], function() {
Route::get('/applications', [UserController::class, 'applications'])->name('applications');
Route::post('/create_app', [UserController::class, 'create_app'])->name('create_app');
Route::get('/filt_desc', [UserController::class, 'desc'])->name('desc');
Route::get('/filt_asc', [UserController::class, 'asc'])->name('asc');
});

Route::get('/signout', [UserController::class, 'signout'])->name('signout');
