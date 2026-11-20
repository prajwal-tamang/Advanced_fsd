<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Courses</title></head>
<body>
<h1>Courses</h1>
@if(session('success'))<p>{{ session('success') }}</p>@endif
<p><a href="/courses/create">Add Course</a> | <a href="/students">Students</a></p>
<table border="1" cellpadding="8">
<tr><th>ID</th><th>Title</th><th>Code</th><th>Fees</th><th>Duration</th><th>Actions</th></tr>
@forelse($courses as $course)
<tr><td>{{ $course->id }}</td><td>{{ $course->title }}</td><td>{{ $course->code }}</td><td>{{ number_format($course->fees, 2) }}</td><td>{{ $course->duration_weeks }} weeks</td>
<td><a href="/courses/{{ $course->id }}">View</a> | <a href="/courses/{{ $course->id }}/edit">Edit</a>
<form action="/courses/{{ $course->id }}" method="POST" style="display:inline">@csrf @method('DELETE')<button type="submit" onclick="return confirm('Delete this course?')">Delete</button></form></td></tr>
@empty<tr><td colspan="6">No courses found.</td></tr>@endforelse
</table>
</body>
</html>
