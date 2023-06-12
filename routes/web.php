<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LangController;
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
    Route::get('lang/{lang}', [LangController::class, 'switchLang'])->name('switch.lang');
    Route::get('/',[QuestionController::class, 'main'])->name('main');
    Route::get('/profile',[ProfileController::class,'profile'])->name('profile');

    Route::get('/instruction',[UsersController::class, 'instruction'])->name('instruction');

    Route::post('/logout',[LoginController::class,'logout'])->name('logout');

    Route::get('category_b',[QuestionController::class,'category_b'])->name('category_b');
    Route::post('question/check/{answer}',[QuestionController::class,'check'])->name('question.check');
    Route::get('/profile_edit',[ProfileController::class,'profileedit'])->name('profileedit');
    Route::post('/profile_edit',[ProfileController::class,'profilestore'])->name('profilestore');
    Route::get('/chat',[ChatController::class, 'index'])->name('communication');
    Route::post('/chat/store',[ChatController::class, 'storeMessage'])->name('storeMessage');

    Route::get('/balance', [UsersController::class, 'balance'])->name('balance');
    Route::put('/addbalance/{user}',[UsersController::class,'addBalance'])->name('addBalance');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{category}/store', [CartController::class, 'store'])->name('cart.store');

    Route::middleware('hasrole:admin,moderator')->group(function (){
        Route::get('/users',[UserController::class, 'users'])->name('user');
        Route::get('/users/search',[UserController::class, 'users'])->name('user.search');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('user.put.edit');
        Route::put('/users/{user}/ban', [UserController::class, 'ban'])->name( 'users.ban');
        Route::put('/users/{user}/unban', [UserController::class, 'unban'])->name('users.unban');
        Route::get('/add_questions', [QuestionController::class, 'add_questions'])->name('add_questions');
        Route::post('/add_questions/store', [QuestionController::class, 'store'])->name('add_questions.store');
        Route::get('/add_answers', [QuestionController::class, 'add_answers'])->name('add_answers');
        Route::post('/add_answer/store', [QuestionController::class, 'answer_store'])->name('add_answer.store');


        Route::get('messages', [ChatController::class,'fetchMessages']);
        Route::post('messages', [ChatController::class,'sendMessage']);

    });

});

Route::get('/login',[LoginController::class, 'create'])->name('login.form');
Route::post('/login',[LoginController::class, 'login'])->name('login');

Route::get('/register',[RegisterController::class, 'create'])->name('register.form');
Route::post('/register',[RegisterController::class, 'register'])->name('register');

