
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Routes for guests
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/register', [AuthController::class, 'regsiter'])->name('register.store');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

// Routes for authenticated users
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [CourseController::class, 'index'])
        ->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::post('/courses', [CourseController::class, 'store'])
        ->name('courses.store');

    Route::get('/courses/{course}', [CourseController::class, 'show'])
        ->name('courses.show');

    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])
        ->name('courses.edit');

    Route::put('/courses/{course}', [CourseController::class, 'update'])
        ->name('courses.update');

    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])
        ->name('courses.destroy');
});
