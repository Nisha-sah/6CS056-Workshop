
<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Guest routes
Route::middleware('guest')->group(function () {

    // Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Register
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

});

// Authenticated routes
Route::middleware('auth')->group(function () {

    // Students
    Route::resource('students', StudentController::class);

    // Courses
    Route::resource('courses', CourseController::class);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});
