<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('course', CourseController::class);
    Route::post('/course/{course}/enroll', [CourseController::class, 'enroll'])->name('course.enroll');
    Route::post('/course/{course}/unenroll', [CourseController::class, 'unenroll'])->name('course.unenroll');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('subscription', SubscriptionController::class);
    Route::post('/subscription/{subscription}/change', [SubscriptionController::class, 'changeSubscription'])->name('subscription.change');
    Route::post('/subscription/{subscription}/cancel', [SubscriptionController::class, 'cancelSubscription'])->name('subscription.cancel');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
