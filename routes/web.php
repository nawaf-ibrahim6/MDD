<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Notification\NotificationController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Registry\RegistryController;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('login.view');
});
Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
Route::get('/login', [AuthController::class, 'create'])->middleware('guest')->name('login.view');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard/profile', [UsersController::class, 'edit_profile'])->name('profile.edit');
Route::put('/dashboard/profile', [UsersController::class, 'update_profile'])->name('profile.update');
Route::put('/dashboard/profile/password', [UsersController::class, 'change_password'])->name('profile.password');
Route::Resource('/dashboard/users', UsersController::class)->except(['show']);
Route::get('/home', [HomeController::class, 'home'])->middleware('auth')->name('home');
Route::post('/notificate', [NotificationController::class, 'store'])->name('notificate.store');
Route::get('/notification', [NotificationController::class, 'index'])->name('notification.index');
Route::get('/ask', [RegistryController::class, 'create'])->name('ask.crate');
Route::post('/ask', [RegistryController::class, 'store'])->name('ask.store');
