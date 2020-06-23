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

// home page
Route::resource('/', 'GameController')->only([
    'index', 'store'
])->names([
    'store' => 'start-game',
    'index' => 'new-game'
]);

// game page & middleware for prevent player access game page before select card
Route::get('/game', 'GameMoveController')->name('draft-card')->middleware('hasCard');
Route::post('/game', 'GameMoveController')->name('draft-card');
