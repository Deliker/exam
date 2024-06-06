<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

// Маршрут домашней страницы
Route::get('/', [HomeController::class, 'index'])->name('home');

// Маршруты для слотов
Route::get('/slots', [SlotController::class, 'index'])->name('slots.index');
Route::get('/slots/fairies-dragons', [SlotController::class, 'fairiesDragons'])->name('slots.fairies-dragons');
Route::get('/slots/magical-tales', [SlotController::class, 'magicalTales'])->name('slots.magical-tales');
Route::get('/slots/mystic-adventure', [SlotController::class, 'mysticAdventure'])->name('slots.mystic-adventure');
Route::get('/slots/mythical-creatures', [SlotController::class, 'mythicalCreatures'])->name('slots.mythical-creatures');
Route::get('/slots/pirates-treasures', [SlotController::class, 'piratesTreasures'])->name('slots.pirates-treasures');

// Маршруты для поддержки
Route::get('/support', [SupportController::class, 'index'])->name('support');

// Маршруты для профиля
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/profile/add-balance', [ProfileController::class, 'addBalance'])->name('profile.add-balance');

// Маршруты для аутентификации
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Auth::routes();

// Убедитесь, что маршрут /home определен только один раз
Route::get('/home', [HomeController::class, 'index'])->name('home');
