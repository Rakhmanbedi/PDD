<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\Auth2\RegisterController;
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



Route::middleware('auth')->group(function (){
    Route::get('/',[QuestionController::class, 'main'])->name('main');
    Route::get('/profile',[ProfileController::class,'profile'])->name('profile');

    Route::get('/instruction',[UsersController::class, 'instruction'])->name('instruction');

    Route::post('/logout',[LoginController::class,'logout'])->name('logout');

    Route::get('category_b',[QuestionController::class,'category_b'])->name('category_b');
    Route::post('question/check/{answer}',[QuestionController::class,'check'])->name('question.check');
    Route::get('/profile_edit',[ProfileController::class,'profileedit'])->name('profileedit');
    Route::post('/profile_edit',[ProfileController::class,'profilestore'])->name('profilestore');
    Route::middleware('hasrole:admin,moderator')->group(function (){
        Route::get('/users',[UserController::class, 'users'])->name('user');
        Route::get('/users/search',[UserController::class, 'users'])->name('user.search');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('user.put.edit');
        Route::put('/users/{user}/ban', [UserController::class, 'ban'])->name('users.ban');
        Route::put('/users/{user}/unban', [UserController::class, 'unban'])->name('users.unban');
    });

});

Route::get('/login',[LoginController::class, 'create'])->name('login.form');
Route::post('/login',[LoginController::class, 'login'])->name('login');

Route::get('/register',[RegisterController::class, 'create'])->name('register.form');
Route::post('/register',[RegisterController::class, 'register'])->name('register');

