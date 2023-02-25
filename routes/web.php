<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\PerfilController;
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

Route::get('/games', [GameController::class,'index'])->name('games.index');
Route::get('/games/search', [GameController::class,'search'])->name('games.search');
Route::get('/games/{game}', [GameController::class,'game'])->name('games.game');

Route::get('/perfil/{perfil}', [PerfilController::class,'show'])->name('perfil.index');
Route::get('/perfil/{perfil}/edit', [PerfilController::class,'edit'])->name('perfilEdit')->middleware("userprofile");
Route::get('/perfil/{perfil}/update', [PerfilController::class,'update'])->name('perfil.update');

Route::get('/panel', [PanelController::class, 'index'])->name('panel.index')->middleware("admin");

Route::get('/logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');


//CRUD USER
Route::get('panel/users', [UserController::class,'index'])->name('users.index')->middleware("admin");
Route::get('panel/users/create', [UserController::class,'create'])->name('users.create')->middleware("admin");
Route::get('panel/users/{user}', [UserController::class,'show'])->name('users.show')->middleware("admin");
Route::get('panel/users/{user}/edit', [UserController::class,'edit'])->name('users.edit')->middleware("admin");
Route::post('panel/users', [UserController::class,'store'])->name('users.store')->middleware("admin");
Route::put('panel/users/{user}', [UserController::class,'update'])->name('users.update')->middleware("admin");
Route::delete('panel/users/{user}/destroy', [UserController::class,'destroy'])->name('users.destroy')->middleware("admin");

//CRUD GAME
Route::get('panel/games', [GameController::class,'panelIndex'])->name('games.panelIndex')->middleware("admin");
Route::get('panel/games/create', [GameController::class,'create'])->name('games.create')->middleware("admin");
Route::delete('panel/games/destroy/{game}', [GameController::class,'destroy'])->name('games.destroy')->middleware("admin");
Route::get('panel/games/show/{game}', [GameController::class,'show'])->name('games.show')->middleware("admin");
Route::get('panel/games/edit/{game}', [GameController::class,'edit'])->name('games.edit')->middleware("admin");
Route::put('panel/games/update/{game}', [GameController::class,'update'])->name('games.update')->middleware("admin");
Route::post('panel/games/store', [GameController::class,'store'])->name('games.store')->middleware("admin");

//CRUD REVIEW
Route::get('panel/reviews/index', [ReviewController::class,'index'])->name('reviews.index')->middleware("admin");
Route::get('panel/reviews/create', [ReviewController::class,'create'])->name('reviews.create')->middleware("admin");
Route::delete('panel/reviews/destroy/{review}', [ReviewController::class,'destroy'])->name('reviews.destroy')->middleware("admin");
Route::get('panel/reviews/show/{review}', [ReviewController::class,'show'])->name('reviews.show')->middleware("admin");
Route::get('panel/reviews/edit/{review}', [ReviewController::class,'edit'])->name('reviews.edit')->middleware("admin");
Route::put('panel/reviews/update/{review}', [ReviewController::class,'update'])->name('reviews.update')->middleware("admin");
Route::post('panel/reviews/store', [ReviewController::class,'store'])->name('reviews.store')->middleware("admin");

//CRUD COMMENT
Route::get('panel/comments/index', [CommentController::class,'index'])->name('comments.index')->middleware("admin");
Route::get('panel/comments/create', [CommentController::class,'create'])->name('comments.create')->middleware("admin");
Route::delete('panel/comments/destroy/{comment}', [CommentController::class,'destroy'])->name('comments.destroy')->middleware("admin");
Route::get('panel/comments/show/{comment}', [CommentController::class,'show'])->name('comments.show')->middleware("admin");
Route::get('panel/comments/edit/{comment}', [CommentController::class,'edit'])->name('comments.edit')->middleware("admin");
Route::put('panel/comments/update/{comment}', [CommentController::class,'update'])->name('comments.update')->middleware("admin");
Route::post('panel/comments/store', [CommentController::class,'store'])->name('comments.store')->middleware("admin");
