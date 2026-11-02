
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Course Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .navbar {
            background-color: #0d6efd;
        }

        .navbar-brand {
            color: white;
            font-weight: bold;
        }

        .main-container {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .card {
            border: none;
        }

        .card-header {
            font-weight: bold;
        }
    </style>
</head>

<body>

    {{-- Top Navigation Bar --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <span class="navbar-brand">Course Dashboard</span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="btn btn-light btn-sm">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="container main-container">

        {{-- Dashboard Heading --}}
        <h2>Dashboard</h2>

        <p class="text-muted mb-4">
            Welcome, {{ auth()->user()->name }}!
        </p>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Messages --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Register a Course --}}
        <div class="card shadow-sm mb-4">

            <div class="card-header bg-primary text-white">
                Register a Course
            </div>

            <div class="card-body">

                <form action="{{ route('courses.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        {{-- Left Side --}}
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label">Course Code</label>

                                <input type="text"
                                       name="course_code"
                                       class="form-control"
                                       value="{{ old('course_code') }}"
                                       placeholder="Enter course code"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Course Name</label>

                                <input type="text"
                                       name="course_name"
                                       class="form-control"
                                       value="{{ old('course_name') }}"
                                       placeholder="Enter course name"
                                       required>
                            </div>

                        </div>

                        {{-- Right Side --}}
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label">Credits</label>

                                <input type="number"
                                       name="credit_hours"
                                       class="form-control"
                                       value="{{ old('credit_hours') }}"
                                       min="2"
                                       max="6"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Semester</label>

                                <select name="semester"
                                        class="form-select"
                                        required>

                                    <option value="">Select Semester</option>

                                    <option value="Spring 2026"
                                        {{ old('semester') == 'Spring 2026' ? 'selected' : '' }}>
                                        Spring 2026
                                    </option>

                                    <option value="Fall 2026"
                                        {{ old('semester') == 'Fall 2026' ? 'selected' : '' }}>
                                        Fall 2026
                                    </option>

                                </select>
                            </div>

                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">
                        Register Course
                    </button>

                </form>

            </div>
        </div>

        {{-- My Registered Courses --}}
        <div class="card shadow-sm">

            <div class="card-header bg-primary text-white">
                My Registered Courses
            </div>

            <div class="card-body">

                @if($courses->count() > 0)

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped align-middle">

                            <thead class="table-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Code</th>
                                    <th>Course Name</th>
                                    <th>Credits</th>
                                    <th>Semester</th>
                                    <th>Registered On</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($courses as $course)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $course->course_code }}</td>

                                        <td>{{ $course->course_name }}</td>

                                        <td>{{ $course->credit_hours }}</td>

                                        <td>{{ $course->semester }}</td>

                                        <td>
                                            {{ $course->created_at->format('Y-m-d') }}
                                        </td>

                                        <td>
                                            <div class="d-flex flex-wrap gap-1">

                                                {{-- View --}}
                                                <a href="{{ route('courses.show', $course->id) }}"
                                                   class="btn btn-info btn-sm">
                                                    View
                                                </a>

                                                {{-- Edit --}}
                                                <a href="{{ route('courses.edit', $course->id) }}"
                                                   class="btn btn-warning btn-sm">
                                                    Edit
                                                </a>

                                                {{-- Delete --}}
                                                <form action="{{ route('courses.destroy', $course->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Are you sure you want to delete this course?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="btn btn-danger btn-sm">
                                                        Delete
                                                    </button>

                                                </form>

                                            </div>
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <p class="text-muted mb-0">
                        No courses registered yet.
                    </p>

                @endif

            </div>
        </div>

    </div>

</body>
</html>
