<?php

use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', IndexController::class)->name('main.index');
});


Route::group(['namespace' => 'App\Http\Controllers\Tasks', 'prefix' => 'tasks', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', 'IndexController')->name('tasks.index');
    Route::get('/create', 'CreateController')->name('tasks.create');
    Route::post('/', 'StoreController')->name('tasks.store');
    Route::get('/{tasks}', 'ShowController')->name('tasks.show');
    Route::get('/{tasks}/edit', 'EditController')->name('tasks.edit');
    Route::patch('/{tasks}', 'UpdateController')->name('tasks.update');
    Route::delete('/{tasks}', 'DeleteController')->name('tasks.delete');
});

Route::group(['namespace' => 'App\Http\Controllers\Tag', 'prefix' => 'tag', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', 'IndexController')->name('tag.index');
    Route::get('/create', 'CreateController')->name('tag.create');
    Route::post('/', 'StoreController')->name('tag.store');
    Route::get('/{tag}', 'ShowController')->name('tag.show');
    Route::get('/{tag}/edit', 'EditController')->name('tag.edit');
    Route::patch('/{tag}', 'UpdateController')->name('tag.update');
    Route::delete('/{tag}', 'DeleteController')->name('tag.delete');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
