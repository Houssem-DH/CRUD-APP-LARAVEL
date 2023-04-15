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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');


Route::group(['middleware' => ['auth','auth-admin']], function () {



    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/members', [App\Http\Controllers\Admin\Members\MembersController::class, 'index']);
    Route::put('edit-member/{id}', [App\Http\Controllers\Admin\Members\MembersController::class, 'edit']);
    Route::get('delete-member/{id}', [App\Http\Controllers\Admin\Members\MembersController::class, 'delete']);
    Route::get('/dashboard/pending-posts', [App\Http\Controllers\Admin\Post\PostController::class, 'index']);
    Route::put('accept-post/{id}', [App\Http\Controllers\Admin\Post\PostController::class, 'accept']);
    Route::put('reject-post/{id}', [App\Http\Controllers\Admin\Post\PostController::class, 'reject']);


});

Route::group(['middleware' => ['auth']], function () {



    Route::get('/profile/{id}', [App\Http\Controllers\User\UserController::class, 'profile']);
    Route::put('edit-profile/{id}', [App\Http\Controllers\User\UserController::class, 'valid']);
    

    Route::post('create-post', [App\Http\Controllers\Post\PostController::class, 'insert'])->name('create-post');
    Route::get('edit-post/{id}', [App\Http\Controllers\Post\PostController::class, 'edit'])->name('edit-post');
    Route::put('update-post/{id}', [App\Http\Controllers\Post\PostController::class, 'update'])->name('update-post');
    Route::get('delete-post/{id}', [App\Http\Controllers\Post\PostController::class, 'delete'])->name('delete-post');


    Route::get('my-posts/{user_id}', [App\Http\Controllers\Post\PostController::class, 'myposts'])->name('myposts');

});
