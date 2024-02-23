<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Employee</title>
</head>
<body>
<h1>Add New Employee</h1>
@if(session('success'))
    <p>{{ session('success') }}</p>
@endif
<form method="POST" action="{{ route('performance.store') }}">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="tel">Telephone:</label>
    <input type="tel" id="tel" name="tel" required><br>

    <h2>Add Work Days</h2>
    <label for="work_month">Month:</label>
    <input type="text" id="work_month" name="work_month" required><br>

    <label for="work_year">Year:</label>
    <input type="text" id="work_year" name="work_year" required><br>

    <label for="workdays">Workdays:</label>
    <input type="number" id="workdays" name="workdays" required><br>

    <h2>Add Leave Days</h2>
    <label for="leave_year">Year:</label>
    <input type="text" id="leave_year" name="leave_year" required><br>

    <label for="leavedays">Leave Days:</label>
    <input type="number" id="leavedays" name="leavedays" required><br>

    <button type="submit">Add Employee</button>
</form>
<br>
<a href="{{ route('performance.index') }}">Back to All Employees</a>
</body>
</html>
