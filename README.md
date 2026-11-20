# Training Institute Management - Workshop 1

A Laravel 12 CRUD application for managing students and courses.

## Features

- Create, view, update, and delete students
- Create, view, update, and delete courses
- Server-side validation and unique email/course-code checks
- CSRF protection for form submissions
- SQLite database for local development
- Blade-based user interface

## Requirements

- PHP 8.2 or newer
- Composer
- PHP SQLite extensions

## Setup

```powershell
composer install
php artisan key:generate
php artisan migrate
php artisan serve
```

Open:

- `http://127.0.0.1:8000/students`
- `http://127.0.0.1:8000/courses`

## Tests

```powershell
php artisan test
```

## Git Branch

The completed Workshop 1 implementation is stored on the `workshop1` branch.
