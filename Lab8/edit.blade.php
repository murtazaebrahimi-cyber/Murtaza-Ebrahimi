
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Course</h4>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('courses.update', $course->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Course Code</label>
                    <input type="text" name="course_code" class="form-control"
                           value="{{ old('course_code', $course->course_code) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Course Name</label>
                    <input type="text" name="course_name" class="form-control"
                           value="{{ old('course_name', $course->course_name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Credit Hours</label>
                    <input type="number" name="credit_hours" class="form-control"
                           value="{{ old('credit_hours', $course->credit_hours) }}" min="2" max="6" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Semester</label>
                    <select name="semester" class="form-select" required>
                        <option value="Spring 2026"
                            @selected(old('semester', $course->semester) === 'Spring 2026')>
                            Spring 2026
                        </option>
                        <option value="Fall 2026"
                            @selected(old('semester', $course->semester) === 'Fall 2026')>
                            Fall 2026
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
            </form>

        </div>
    </div>
</div>

</body>
</html>
