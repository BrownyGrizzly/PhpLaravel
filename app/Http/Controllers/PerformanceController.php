<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Leavedays;
use App\Models\Workdays;
use Illuminate\Http\Request;

class PerformanceController extends Controller
{
    public function index()
    {
        // Retrieve all employees
        $employees = Employee::all();

        // Pass the employees data to the view
        return view('performance.index', ['employees' => $employees]);
    }

    public function show($id)
    {
        // Retrieve the employee with the given ID
        $employee = Employee::findOrFail($id);

        // Retrieve workdays and leave days for the employee for the current year
        $currentYear = date('Y');
        $workdaysThisYear = Workdays::where('employee_id', $id)
            ->where('year', $currentYear)
            ->sum('workdays');
        $leaveDaysThisYear = Leavedays::where('employee_id', $id)
            ->where('year', $currentYear)
            ->sum('leavedays');

        // Calculate attendance percentage for the current year
        $totalPossibleWorkdaysThisYear = 22 * date('n');
        $attendancePercentageYear = (($totalPossibleWorkdaysThisYear - $leaveDaysThisYear) / $totalPossibleWorkdaysThisYear) * 100;

        // Calculate base salary per workday
        $baseSalaryPerWorkday = 200;

        // Calculate total salary for the current year
        $totalSalaryThisYear = ($baseSalaryPerWorkday * $workdaysThisYear) + (($leaveDaysThisYear == 0) ? ($baseSalaryPerWorkday * 12) : 0);

        // Pass the employee and related data to the view
        return view('performance.show', [
            'employee' => $employee,
            'attendancePercentageYear' => $attendancePercentageYear,
            'totalSalaryThisYear' => $totalSalaryThisYear
        ]);
    }

    public function create()
    {
        // Return the view for adding a new employee
        return view('performance.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'monthly_salary' => 'required|numeric|min:0',
            // Add more validation rules as needed
        ]);

        // Create a new employee record
        $employee = Employee::create($validatedData);

        // Redirect back to the index page with a success message
        return redirect()->route('performance.index')->with('success', 'Employee added successfully.');
    }
}
