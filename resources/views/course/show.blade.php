<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Course Details</title></head>
<body>
<h1>Course Details</h1>
@if(session('success'))<p>{{ session('success') }}</p>@endif
<p><strong>ID:</strong> {{ $course->id }}</p>
<p><strong>Title:</strong> {{ $course->title }}</p>
<p><strong>Code:</strong> {{ $course->code }}</p>
<p><strong>Description:</strong> {{ $course->description ?: 'N/A' }}</p>
<p><strong>Fees:</strong> {{ number_format($course->fees, 2) }}</p>
<p><strong>Duration:</strong> {{ $course->duration_weeks }} weeks</p>
<p><a href="/courses/{{ $course->id }}/edit">Edit</a> | <a href="/courses">Back to Courses</a></p>
</body>
</html>
