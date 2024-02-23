<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Performance Tracking</title>
</head>
<body>
<h1>All Employees</h1>
<ul>
    @foreach($employees as $employee)
        <li>
            <a href="{{ route('performance.show', $employee->id) }}">{{ $employee->name }}</a>
        </li>
    @endforeach
</ul>
<a href="{{ route('performance.create') }}">Add New Employee</a>
</body>
</html>
