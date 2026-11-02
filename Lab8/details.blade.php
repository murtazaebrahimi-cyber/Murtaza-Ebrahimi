
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Course Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Course Details</h4>
        </div>

        <div class="card-body">
            <p><strong>Course Code:</strong> {{ $course->course_code }}</p>
            <p><strong>Course Name:</strong> {{ $course->course_name }}</p>
            <p><strong>Credit Hours:</strong> {{ $course->credit_hours }}</p>
            <p><strong>Semester:</strong> {{ $course->semester }}</p>
            <p><strong>Registered On:</strong> {{ $course->created_at->format('Y-m-d') }}</p>

            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                Back to Dashboard
            </a>
        </div>
    </div>
</div>

</body>
</html>
