<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Course;

class CourseController extends Controller
{
    // Display registered courses
    public function index()
    {
        $courses = Course::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('dashboard', compact('courses'));
    }

    // Store a new course
    public function store(Request $request)
    {
        $request->merge([
            'course_code' => strtoupper(trim((string) $request->input('course_code', '')))
        ]);

        $validated = $request->validate([
            'course_code' => [
                'required',
                'string',
                'max:20',
                Rule::unique('courses', 'course_code')
                    ->where('user_id', $request->user()->id)
            ],
            'course_name' => ['required', 'string', 'max:150'],
            'credit_hours' => ['required', 'integer', 'between:2,6'],
            'semester' => [
                'required',
                Rule::in(['Spring 2026', 'Fall 2026']),
            ],
        ]);

        $validated['user_id'] = $request->user()->id;

        Course::create($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Course registered!');
    }

    // View course details
    public function show(Course $course)
    {
        abort_unless($course->user_id === auth()->id(), 404);

        return view('courses.details', compact('course'));
    }

    // Show edit form
    public function edit(Course $course)
    {
        abort_unless($course->user_id === auth()->id(), 404);

        return view('courses.edit', compact('course'));
    }

    // Update course
    public function update(Request $request, Course $course)
    {
        abort_unless($course->user_id === auth()->id(), 404);

        $request->merge([
            'course_code' => strtoupper(trim((string) $request->input('course_code', '')))
        ]);

        $validated = $request->validate([
            'course_code' => [
                'required',
                'string',
                'max:20',
                Rule::unique('courses', 'course_code')
                    ->where('user_id', $request->user()->id)
                    ->ignore($course->id),
            ],
            'course_name' => ['required', 'string', 'max:150'],
            'credit_hours' => ['required', 'integer', 'between:2,6'],
            'semester' => [
                'required',
                Rule::in(['Spring 2026', 'Fall 2026']),
            ],
        ]);

        $course->update($validated);

        return redirect()->route('dashboard')
            ->with('success', 'Course updated successfully!');
    }

    // Delete course
    public function destroy(Course $course)
    {
        abort_unless($course->user_id === auth()->id(), 404);

        $course->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Course deleted successfully!');
    }
}
