<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Create Course</title></head>
<body>
<h1>Create Course</h1>
@if($errors->any())<div><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<form action="/courses" method="POST">
@csrf
<div><label>Title</label><input type="text" name="title" value="{{ old('title') }}" required></div><br>
<div><label>Code</label><input type="text" name="code" value="{{ old('code') }}" required></div><br>
<div><label>Description</label><textarea name="description">{{ old('description') }}</textarea></div><br>
<div><label>Fees</label><input type="number" step="0.01" min="0" name="fees" value="{{ old('fees') }}" required></div><br>
<div><label>Duration (weeks)</label><input type="number" min="1" name="duration_weeks" value="{{ old('duration_weeks') }}" required></div><br>
<button type="submit">Create Course</button>
</form>
<p><a href="/courses">Back to Courses</a></p>
</body>
</html>
