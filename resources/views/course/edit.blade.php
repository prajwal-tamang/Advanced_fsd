<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Edit Course</title></head>
<body>
<h1>Edit Course</h1>
@if($errors->any())<div><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<form action="/courses/{{ $course->id }}" method="POST">
@csrf @method('PUT')
<div><label>Title</label><input type="text" name="title" value="{{ old('title', $course->title) }}" required></div><br>
<div><label>Code</label><input type="text" name="code" value="{{ old('code', $course->code) }}" required></div><br>
<div><label>Description</label><textarea name="description">{{ old('description', $course->description) }}</textarea></div><br>
<div><label>Fees</label><input type="number" step="0.01" min="0" name="fees" value="{{ old('fees', $course->fees) }}" required></div><br>
<div><label>Duration (weeks)</label><input type="number" min="1" name="duration_weeks" value="{{ old('duration_weeks', $course->duration_weeks) }}" required></div><br>
<button type="submit">Update Course</button>
</form>
<p><a href="/courses">Back to Courses</a></p>
</body>
</html>
