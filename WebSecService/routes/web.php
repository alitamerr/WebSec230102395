<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GpaSimulatorController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::post('/logout', [LoginController::class, 'logout'])->name('do_logout');

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showSecurityQuestionForm'])->name('forgot.password');


Route::get('/profile', [ProfileController::class, 'changePassword'])->name('profile');
Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('update_password');

// Home Page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication Routes
Route::controller(UserController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'doRegister')->name('do_register');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'doLogin')->name('do_login');
    Route::get('logout', [UserController::class, 'doLogout'])->name('do_logout');
    Route::get('/change-password', 'ProfileController@changePassword')->name('change_password');
    Route::post('/change-password', 'ProfileController@updatePassword')->name('update_password');
});

// Profile & Password Change
Route::middleware('auth')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('profile', 'showProfile')->name('profile');
        Route::post('change-password', 'changePassword')->name('change_password');
    });
});


// Pages
Route::controller(PageController::class)->group(function () {
    Route::get('/calculator', 'calculator')->name('calculator');
    Route::get('/even', 'even')->name('even');
    Route::get('/multable', 'multable')->name('multable');
    Route::get('/prime', 'prime')->name('prime');
    Route::get('/transcript', 'transcript')->name('transcript');
});

// Products
Route::controller(ProductsController::class)->group(function () {
    Route::get('/products', 'list')->name('products');
});

// GPA Simulator
Route::controller(GpaSimulatorController::class)->group(function () {
    Route::get('/gpa-simulator', 'index')->name('gpa_simulator');
});


Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/manage-users', [AdminController::class, 'users'])->name('manage_users');
    Route::post('/admin/users/{user}/assign-role', [AdminController::class, 'assignRole'])->name('admin.assignRole');
    Route::post('/admin/users/{user}/remove-role', [AdminController::class, 'removeRole'])->name('admin.removeRole');
});

Route::middleware('auth')->group(function () {
    Route::get('profile', [UserController::class, 'showProfile'])->name('profile');
    Route::post('change-password', [UserController::class, 'changePassword'])->name('change_password');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('grades', GradesController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class);
});



// Show forgot password form (Enter email)
Route::get('/forgot-password', [ForgotPasswordController::class, 'showSecurityQuestionForm'])->name('forgot.password');

// Process email and show security question
Route::post('/forgot-password', [ForgotPasswordController::class, 'checkSecurityAnswer'])->name('forgot.password.check');

// Show reset password form after correct answer
Route::get('/reset-password', function (Request $request) {
    return view('auth.reset-password', ['email' => $request->query('email')]);
})->name('reset.password.form');

// Handle the password reset
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password');


Route::get('/admin/manage-users', [AdminController::class, 'users'])->name('manage_users');
