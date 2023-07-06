<?php

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

Route::get('/', function () {
    return view('welcome');
});

//API
Route::get('/API/US/{tag}',[\App\Http\Controllers\API\USController::class, 'index']);
Route::get('/API/Rename/{id}/{name}',[\App\Http\Controllers\API\RenameController::class, 'index']);

Route::middleware('auth')->group(function () {
Route::get('/user', \App\Http\Controllers\User\IndexController::class)
->name('user.index');
Route::post('/user/reserve', \App\Http\Controllers\User\ReserveController::class)
->name('user.reserve');
});

Route::get('/admin/login', function () {
    return view('adminLogin');
})->middleware('guest:admin');
Route::post('/admin/login', [\App\Http\Controllers\LoginController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/logout', [\App\Http\Controllers\LoginController::class, 'adminLogout'])->name('admin.logout');

Route::middleware('auth:admin')->group(function () {
Route::get('/admin/dashboard', \App\Http\Controllers\Admin\IndexController::class)->name('admin.index');
Route::post('/admin/change', \App\Http\Controllers\Admin\ChangeController::class)->name('admin.change');
Route::get('/admin/dashboard/usertable', \App\Http\Controllers\Admin\UserTable\UserController::class)->name('admin.usertable');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
