<?php

use App\Http\Controllers\UserController;
use App\Models\User;
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
})
    ->name('login');

// Create new user
Route::post('/register', [UserController::class, 'store']);


// Born same day
Route::get('/born-same-day',[UserController::class, 'get'])
    ->middleware('auth')
    ->name('born-same-day');