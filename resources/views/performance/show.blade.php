<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Performance - {{ $employee->name }}</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<h1>{{ $employee->name }}</h1>
<h2>Attendance Metrics</h2>
<p>Attendance Percentage for the Year: {{ $attendancePercentageYear }}%</p>
<p>Total Salary for the Year: ${{ $totalSalaryThisYear }}</p>
<h2>Employee Performance Chart</h2>
<canvas id="performanceChart" width="400" height="200"></canvas>

<script>
    // Get the attendance percentage for the year from PHP variable
    const attendancePercentageYear = {!! $attendancePercentageYear !!};

    // Create a new Chart.js instance
    const ctx = document.getElementById('performanceChart').getContext('2d');
    const performanceChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Attendance Percentage'],
            datasets: [{
                label: 'Performance',
                data: [attendancePercentageYear],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.5)', // Blue color with opacity
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)', // Blue color
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100 // Set maximum value to 100 for percentage
                }
            }
        }
    });
</script>
<a href="{{ route('performance.index') }}">Back to All Employees</a>
</body>
</html>
