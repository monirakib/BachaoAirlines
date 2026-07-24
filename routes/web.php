<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register.post');
});

// Password Reset Routes
Route::middleware('guest')->group(function () {
    Route::get('forgot-password', [AuthController::class, 'showForgotPasswordForm'])
        ->name('password.request');
    Route::post('forgot-password', [AuthController::class, 'sendResetLink'])
        ->name('password.email');
    Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])
        ->name('password.reset');
    Route::post('reset-password', [AuthController::class, 'resetPassword'])
        ->name('password.update');
});

// Protected routes
Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('reward-points', [UserController::class, 'rewardPoints'])->name('reward_points');
    Route::get('transaction/{flight_id}', [TransactionController::class, 'create'])->name('transaction');
    Route::post('transaction/store', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('transaction/{id}/confirmation', [TransactionController::class, 'confirmation'])->name('transaction.confirmation');
    Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('profile/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('profile/update', [UserController::class, 'update'])->name('user.update');
});

// Public feature routes
Route::get('travel-insurance', [DashboardController::class, 'travelInsurance'])->name('travel_insurance');
Route::get('promo', [DashboardController::class, 'promo'])->name('promo');
Route::get('promo/{code}', [DashboardController::class, 'promoDetails'])->name('promo.details');
Route::get('recommend', [DashboardController::class, 'recommend'])->name('recommend');
Route::get('feedback', [FeedbackController::class, 'index'])->name('feedback');
Route::post('faq/suggest', [FaqController::class, 'suggest'])->name('faq.suggest');

// Feedback routes
Route::post('feedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/flights', [AdminController::class, 'flights'])->name('admin.flights');
    Route::post('/flights', [AdminController::class, 'storeFlight'])->name('admin.flights.store');
    Route::get('/flights/{flight}/edit', [AdminController::class, 'editFlight'])->name('admin.flights.edit');
    Route::put('/flights/{flight}', [AdminController::class, 'updateFlight'])->name('admin.flights.update');
    Route::delete('/flights/{flight}', [AdminController::class, 'destroyFlight'])->name('admin.flights.destroy');

    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');

    Route::get('/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
    Route::get('/bookings/{booking}', [AdminController::class, 'showBooking'])->name('admin.bookings.show');
    Route::delete('/bookings/{booking}', [AdminController::class, 'cancelBooking'])->name('admin.bookings.cancel');
});
