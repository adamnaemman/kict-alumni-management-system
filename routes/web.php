<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware('auth')->group(function () {

    // Dashboard Logic
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.approvals');
        }
        return redirect()->route('alumni.dashboard');
    })->name('dashboard');

    // Alumni Routes
    Route::get('/alumni/dashboard', [AlumniController::class, 'dashboard'])->name('alumni.dashboard');
    Route::post('/alumni/request', [AlumniController::class, 'submitRequest'])->name('alumni.request');

    // Profile
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    // Achievements
    Route::get('/achievements', [\App\Http\Controllers\AchievementController::class, 'index'])->name('achievements.index');
    Route::get('/achievements/create', [\App\Http\Controllers\AchievementController::class, 'create'])->name('achievements.create');
    Route::post('/achievements', [\App\Http\Controllers\AchievementController::class, 'store'])->name('achievements.store');
    Route::get('/achievements/{achievement}/edit', [\App\Http\Controllers\AchievementController::class, 'edit'])->name('achievements.edit');
    Route::put('/achievements/{achievement}', [\App\Http\Controllers\AchievementController::class, 'update'])->name('achievements.update');
    Route::delete('/achievements/{achievement}', [\App\Http\Controllers\AchievementController::class, 'destroy'])->name('achievements.destroy');

    // Admin Routes
    Route::get('/admin/approvals', [AdminController::class, 'index'])->name('admin.approvals');
    Route::get('/admin/request/{id}', [AdminController::class, 'show'])->name('admin.show');
    Route::post('/admin/approve/{id}', [AdminController::class, 'approveRequest'])->name('admin.approve');
    Route::post('/admin/reject/{id}', [AdminController::class, 'rejectRequest'])->name('admin.reject');

    // Feedback Routes
    Route::get('/feedback', [\App\Http\Controllers\FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback', [\App\Http\Controllers\FeedbackController::class, 'store'])->name('feedback.store');
});
