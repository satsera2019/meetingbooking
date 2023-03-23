<?php

use App\Http\Controllers\AdminPanel\AuthController;
use App\Http\Controllers\AdminPanel\RoomController;
use App\Http\Controllers\AdminPanel\UserController;
use App\Http\Controllers\TabletPanel\TabletController;
use App\Http\Controllers\UserPanel\BookingController;
use App\Http\Controllers\UserPanel\MainController;
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
    return view('user-panel.layouts.app');
})->name('home');

Route::namespace('TabletPanel')->name('tablet-panel.')->prefix('/tablet-panel')->group(function () {
    Route::get('/', [TabletController::class, 'index'])->name('index');

    Route::prefix('rooms')->name('rooms.')->group(function () {
        Route::get('/index', [TabletController::class, 'rooms'])->name('index');
        Route::get('/room/{room}', [TabletController::class, 'roomDetail'])->name('detail');
    });

    Route::post('/booking/{room}', [TabletController::class, 'createBooking'])->name('booking.create');

    Route::get('/meetings', [TabletController::class, 'meetings'])->name('meetings');
});

Route::namespace('UserPanel')->name('user-panel.')->prefix('user-panel')->group(function () {
    Route::get('/', [MainController::class, 'loginForm'])->name('loginform');
    Route::post('/login', [MainController::class, 'login'])->name('login');
    Route::get('/logout', [MainController::class, 'logout'])->name('logout');

    Route::middleware(['auth'])->group(function () {
        Route::get('/index', [MainController::class, 'index'])->name('index');

        Route::prefix('bookings')->name('bookings.')->group(function () {
            Route::get('/index', [BookingController::class, 'index'])->name('index');
            Route::get('/create', [BookingController::class, 'create'])->name('create');
            Route::post('/{room}/store', [BookingController::class, 'store'])->name('store');
            Route::delete('/{booking}/destroy', [BookingController::class, 'destroyBooking'])->name('destroy');
        });
    });
});

Route::namespace('AdminPanel')->name('admin-panel.')->prefix('admin-panel')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('loginform');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/registerform', [AuthController::class, 'registerform'])->name('registerform');
    Route::post('/register', [AuthController::class, 'register'])->name('register');


    Route::middleware(['admin-auth', 'check-admin'])->group(function () {

        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/create', [UserController::class, 'store'])->name('store');
            Route::get('/{user}', [UserController::class, 'edit'])->name('edit');
            Route::post('/{user}', [UserController::class, 'update'])->name('update');
            Route::delete('/{user}/destroy', [UserController::class, 'destroyUser'])->name('destroy');
        });

        Route::prefix('rooms')->name('rooms.')->group(function () {
            Route::get('/', [RoomController::class, 'index'])->name('index');
            Route::get('/create', [RoomController::class, 'create'])->name('create');
            Route::post('/create', [RoomController::class, 'store'])->name('store');
            Route::get('/{room}', [RoomController::class, 'edit'])->name('edit');
            Route::post('/{room}', [RoomController::class, 'update'])->name('update');
            Route::delete('/{room}/destroy', [RoomController::class, 'destroyRoom'])->name('destroy');
        });
    });
});
