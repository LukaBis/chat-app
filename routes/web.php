<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;

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
    return redirect('/login');
});

Route::get('/dashboard', [UserController::class, 'home'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/{id}', [UserController::class, 'getChatUser'])->middleware(['auth'])->name('chatUser');
Route::post('/search', [UserController::class, 'searchUsers'])->middleware(['auth'])->name('search-users');
Route::put('/profile', [UserController::class, 'updateProfile'])->middleware(['auth'])->name('update-profile');
Route::put('/update-account', [UserController::class, 'updateAccount'])->middleware(['auth'])->name('update-account');
Route::post('/block', [UserController::class, 'blockUser'])->middleware(['auth'])->name('block-user');
Route::delete('/chat', [UserController::class, 'deleteChat'])->middleware(['auth'])->name('delete-chat');
Route::post('/message', [MessageController::class, 'sendMessage'])->middleware(['auth'])->name('sendMessage');
Route::post('/image-message', [MessageController::class, 'sendImageMessage'])->middleware(['auth'])->name('sendImageMessage');

require __DIR__.'/auth.php';
