<?php

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/students');
});

Route::get('/students', function () {
    return view('student.index', ['students' => Student::orderBy('id', 'desc')->get()]);
});

Route::get('/students/create', function () {
    return view('student.create');
});

Route::post('/students', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:students,email',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string',
        'date_of_birth' => 'nullable|date',
    ]);

    $student = Student::create($validated);
    return redirect('/students/' . $student->id)->with('success', 'Student created successfully!');
});

Route::get('/students/{id}', function ($id) {
    return view('student.show', ['student' => Student::findOrFail($id)]);
});

Route::get('/students/{id}/edit', function ($id) {
    return view('student.edit', ['student' => Student::findOrFail($id)]);
});

Route::put('/students/{id}', function (Request $request, $id) {
    $student = Student::findOrFail($id);
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => ['required', 'email', 'max:255', Rule::unique('students')->ignore($student->id)],
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string',
        'date_of_birth' => 'nullable|date',
    ]);

    $student->update($validated);
    return redirect('/students/' . $student->id)->with('success', 'Student updated successfully!');
});

Route::delete('/students/{id}', function ($id) {
    Student::findOrFail($id)->delete();
    return redirect('/students')->with('success', 'Student deleted successfully!');
});

Route::get('/courses', function () {
    return view('course.index', ['courses' => Course::orderBy('id', 'desc')->get()]);
});

Route::get('/courses/create', function () {
    return view('course.create');
});

Route::post('/courses', function (Request $request) {
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'code' => 'required|string|max:50|unique:courses,code',
        'description' => 'nullable|string',
        'fees' => 'required|numeric|min:0',
        'duration_weeks' => 'required|integer|min:1',
    ]);

    $course = Course::create($validated);
    return redirect('/courses/' . $course->id)->with('success', 'Course created successfully!');
});

Route::get('/courses/{id}', function ($id) {
    return view('course.show', ['course' => Course::findOrFail($id)]);
});

Route::get('/courses/{id}/edit', function ($id) {
    return view('course.edit', ['course' => Course::findOrFail($id)]);
});

Route::put('/courses/{id}', function (Request $request, $id) {
    $course = Course::findOrFail($id);
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'code' => ['required', 'string', 'max:50', Rule::unique('courses')->ignore($course->id)],
        'description' => 'nullable|string',
        'fees' => 'required|numeric|min:0',
        'duration_weeks' => 'required|integer|min:1',
    ]);

    $course->update($validated);
    return redirect('/courses/' . $course->id)->with('success', 'Course updated successfully!');
});

Route::delete('/courses/{id}', function ($id) {
    Course::findOrFail($id)->delete();
    return redirect('/courses')->with('success', 'Course deleted successfully!');
});
