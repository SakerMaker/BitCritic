<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/games', [GameController::class,'index'])->name('games');
Route::get('/games/search', [GameController::class,'search'])->name('games.search');
Route::get('/panel', [PanelController::class, 'index'])->name('panel')->middleware("admin");
Route::get('/logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');


//CRUD USER
Route::get('panel/users/index', [UserController::class,'index'])->name('users.index');
Route::get('panel/users/create', [UserController::class,'create'])->name('users.create');
Route::delete('panel/users/destroy/{user}', [UserController::class,'destroy'])->name('users.destroy');
Route::get('panel/users/show/{user}', [UserController::class,'show'])->name('users.show');
Route::get('panel/users/edit/{user}', [UserController::class,'edit'])->name('users.edit');
Route::put('panel/users/update/{user}', [UserController::class,'update'])->name('users.update');
Route::post('panel/users/store', [UserController::class,'store'])->name('users.store');

//CRUD GAME
Route::get('panel/games/resultados', [GameController::class,'resultados'])->name('games.resultados');
Route::get('panel/games/create', [GameController::class,'create'])->name('games.create');
Route::delete('panel/games/destroy/{game}', [GameController::class,'destroy'])->name('games.destroy');
Route::get('panel/games/show/{game}', [GameController::class,'show'])->name('games.show');
Route::get('panel/games/edit/{game}', [GameController::class,'edit'])->name('games.edit');
Route::put('panel/games/update/{game}', [GameController::class,'update'])->name('games.update');
Route::post('panel/games/store', [GameController::class,'store'])->name('games.store');

//CRUD REVIEW
Route::get('panel/reviews/index', [ReviewController::class,'index'])->name('reviews.index');
Route::get('panel/reviews/create', [ReviewController::class,'create'])->name('reviews.create');
Route::delete('panel/reviews/destroy/{review}', [ReviewController::class,'destroy'])->name('reviews.destroy');
Route::get('panel/reviews/show/{review}', [ReviewController::class,'show'])->name('reviews.show');
Route::get('panel/reviews/edit/{review}', [ReviewController::class,'edit'])->name('reviews.edit');
Route::put('panel/reviews/update/{review}', [ReviewController::class,'update'])->name('reviews.update');
Route::post('panel/reviews/store', [ReviewController::class,'store'])->name('reviews.store');

//CRUD COMMENT
Route::get('panel/comments/index', [CommentController::class,'index'])->name('comments.index');
Route::get('panel/comments/create', [CommentController::class,'create'])->name('comments.create');
Route::delete('panel/comments/destroy/{comment}', [CommentController::class,'destroy'])->name('comments.destroy');
Route::get('panel/comments/show/{comment}', [CommentController::class,'show'])->name('comments.show');
Route::get('panel/comments/edit/{comment}', [CommentController::class,'edit'])->name('comments.edit');
Route::put('panel/comments/update/{comment}', [CommentController::class,'update'])->name('comments.update');
Route::post('panel/comments/store', [CommentController::class,'store'])->name('comments.store');
