<?php

use App\Http\Controllers\AdminPanel\AuthController;
use App\Http\Controllers\AdminPanel\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

// Route::middleware(['check-admin'])->name('admin-panel.')->prefix('admin-panel')->group(function () {
//     Route::prefix('users')->name('users.')->group(function () {
//         Route::get('/', [UserController::class, 'index'])->name('index');
//     });
// });

Route::namespace('AdminPanel')->name('admin-panel.')->prefix('admin-panel')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('index');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/registerform', [AuthController::class, 'registerform'])->name('registerform');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::middleware(['check-admin'])->group(function () {
        
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
        });

    });
});
