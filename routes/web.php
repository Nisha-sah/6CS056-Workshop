
<?php

use App\Http\Controllers\StudentController;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

// Welcome page
Route::get('/', function () {
    return view('welcome');
});


//  STUDENT ROUTES 
Route::resource('students', StudentController::class);

//course Routes
Route::resource('courses', CourseController::class);



// Display all students
Route::get('/students', [StudentController::class, 'index'])
    ->name('students.index');

// Show create student form
Route::get('/students/create', [StudentController::class, 'create'])
    ->name('students.create');

// Save new student
Route::post('/students', [StudentController::class, 'store'])
    ->name('students.store');

// Display one student
Route::get('/students/{id}', [StudentController::class, 'show'])
    ->name('students.show');

// Show edit student form
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])
    ->name('students.edit');

// Update student
Route::put('/students/{id}', [StudentController::class, 'update'])
    ->name('students.update');

// Delete student
Route::delete('/students/{id}', [StudentController::class, 'destroy'])
    ->name('students.destroy');


//  COURSE ROUTES 

// Display all courses
Route::get('/courses', function () {
    $courses = Course::all();

    return view('course_list', [
        'courses' => $courses,
    ]);
});

// Show create course form
Route::get('/courses/create', function () {
    return view('course_create');
});

// Save new course
Route::post('/courses', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'duration' => 'required|integer|min:1',
        'fee' => 'required|numeric|min:0',
        'difficulty' => 'required|in:Easy,Medium,Hard',
        'is_active' => 'required|boolean',
    ]);

    $course = Course::create($validated);

    return redirect('/courses')
        ->with('success', 'Course created successfully!');
});

// Display one course
Route::get('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);

    return view('course_detail', [
        'course' => $course,
    ]);
});

// Show edit course form
Route::get('/courses/{id}/edit', function ($id) {
    $course = Course::findOrFail($id);

    return view('course_edit', [
        'course' => $course,
    ]);
});

// Update course
Route::put('/courses/{id}', function (Request $request, $id) {
    $course = Course::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'duration' => 'required|integer|min:1',
        'fee' => 'required|numeric|min:0',
        'difficulty' => 'required|in:Easy,Medium,Hard',
        'is_active' => 'required|boolean',
    ]);

    $course->update($validated);

    return redirect('/courses/' . $course->id)
        ->with('success', 'Course updated successfully!');
});

// Delete course
Route::delete('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);
    $course->delete();

    return redirect('/courses')
        ->with('success', 'Course deleted successfully!');
});
