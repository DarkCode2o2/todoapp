<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
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


Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/logout', function() {
        return redirect('login');
    });

    // Tasks 
    Route::get('/', [TaskController::class, 'index']);
    Route::get('/tasks/all', [TaskController::class, 'showAll'])->name('showAll');
    Route::post('/tasks/done/{id}', [TaskController::class, 'done'])->name('tasks.done');
    Route::resource('tasks', TaskController::class);

    // Profile 
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'loginStore'])->name('loginStore');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'registerStore'])->name('registerStore');
});