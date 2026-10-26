```php
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [
        CourseController::class,
        'index'
    ])->name('dashboard');


    // Register Course
    Route::post('/courses', [
        CourseController::class,
        'store'
    ])->name('courses.store');


    // Keep your existing logout route here

});
```
