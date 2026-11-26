
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

// Home page
Route::get('/', function () {
    return view('welcome');
});

// Course routes
Route::resource('courses', CourseController::class);

