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


Route::get('/', [\App\Http\Controllers\HomeController::class, 'login_form'])->name('home');
Route::post('/', [\App\Http\Controllers\HomeController::class, 'log_in']);
Route::get('/logout', [\App\Http\Controllers\HomeController::class, 'log_out']);

Route::get('/{id}', [\App\Http\Controllers\ActionController::class, 'show'])->whereNumber('id')->name('actions.show');
Route::post('/{id}', [\App\Http\Controllers\HomeController::class, 'log_in'])->whereNumber('id');

Route::match(['get', 'post'],'actions/form', [\App\Http\Controllers\ActionController::class, 'update_or_create'])->whereNumber('id');
Route::match(['get', 'post'], 'actions/form/{id?}', [\App\Http\Controllers\ActionController::class, 'update_or_create'])->whereNumber('id');

Route::get('delete/{id}', [\App\Http\Controllers\ActionController::class, 'delete'])->whereNumber('id')->name('delete');

Route::get('warning', [\App\Http\Controllers\ActionController::class, 'warning'])->name('warning');


