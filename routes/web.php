<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PanelController;
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

Route::get('games/resultados', [GameController::class,'resultados'])->name('games.resultados');
Route::get('games/create', [GameController::class,'create'])->name('games.create');
Route::delete('games/destroy/{game}', [GameController::class,'destroy'])->name('games.destroy');
Route::get('games/show/{game}', [GameController::class,'show'])->name('games.show');
Route::get('games/edit/{game}', [GameController::class,'edit'])->name('games.edit');
Route::put('games/update/{game}', [GameController::class,'update'])->name('games.update');
Route::post('games/store', [GameController::class,'store'])->name('games.store');
