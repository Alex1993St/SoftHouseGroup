<?php

use App\Http\Controllers\LoggerController;
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


Route::post('log', [LoggerController::class, 'log'])->name('log');
Route::post('logTo', [LoggerController::class, 'logTo'])->name('logTo');
Route::post('logToAll', [LoggerController::class, 'logToAll'])->name('logToAll');


