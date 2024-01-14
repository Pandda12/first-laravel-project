<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace'=>'App\Http\Controllers\Post'], function (){
    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::post('/posts/create', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.delete');
});

Route::group(['namespace'=>'App\Http\Controllers\Admin', 'prefix' => 'admin'], function (){
    Route::group(['namespace'=>'Post'], function (){
        Route::get('/posts', 'IndexController')->name('office.post.index');
    });
});


Route::get('/posts/update', [\App\Http\Controllers\PostController::class, 'update']);
Route::get('/posts/delete', [\App\Http\Controllers\PostController::class, 'delete']);
Route::get('/posts/first-or-create', [\App\Http\Controllers\PostController::class, 'firstOrCreate']);
Route::get('/posts/update-or-create', [\App\Http\Controllers\PostController::class, 'updateOrCreate']);

Route::get('/main', [\App\Http\Controllers\MainController::class, 'index'])->name('main.index');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');
Route::get('/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
