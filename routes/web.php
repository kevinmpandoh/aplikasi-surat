<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\TembusanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PenempatanController;

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

// Login
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


// Surat
Route::get("/dashboard/surat/{surat:id}/cetak", [SuratController::class, 'cetak_surat']);
Route::resource("/dashboard/surat", SuratController::class)->middleware('auth');

// Tembusan
Route::controller(TembusanController::class)->group(function () {
    Route::get('/dashboard/tembusan', 'index')->middleware('auth');
    Route::post('/dashboard/tembusan', 'store')->middleware('auth');
    Route::post('/dashboard/getTembusan', 'getTembusanbyid');
    Route::put('/dashboard/tembusan/{tembusan}', 'update');
    Route::delete('/dashboard/tembusan/{tembusan}', 'destroy');
});

// Profile
Route::get('/dashboard/profile/{profile:user_id}', [ProfileController::class, 'show'])->middleware('auth');
Route::get('/dashboard/profile/{profile:user_id}/edit', [ProfileController::class, 'edit'])->middleware('auth');
Route::put('/dashboard/profile/{profile:user_id}', [ProfileController::class, 'update'])->middleware('auth');


// User
Route::post('/dashboard/getUser', [UserController::class, 'getUserbyid']);
Route::resource('/dashboard/user', UserController::class)->middleware('admin');

// Role
Route::post('/dashboard/getRole', [RoleController::class, 'getRolebyid']);
Route::resource('/dashboard/role', RoleController::class)->middleware("admin");

// Penempatan
Route::post('/dashboard/getPenempatan', [PenempatanController::class, 'getPenempatanbyid']);
Route::resource('/dashboard/penempatan', PenempatanController::class)->middleware("admin");
