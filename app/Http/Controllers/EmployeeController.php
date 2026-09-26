<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\EmploymentStatus;
use App\Models\SalaryRates;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Position;

class EmployeeController extends Controller
{
   public function index()
{
    $employees = Employee::with([
        'department',
        'position',
        'employmentStatus',
        'salaryrates'
    ])
        ->orderBy('id', 'asc')
        ->paginate(10);

    return view('employee.index', [
        'employees' => $employees
    ]);
}



    public function home()
    {
        // Total employees
        $totalEmployees = Employee::count();

        // Total departments
        $totalDepartments = Department::count();

        // Total positions
        $totalPositions = Position::count();

        // Total employment statuses
        $totalStatuses = EmploymentStatus::count();

        // Employees by department
        $departmentEmployees = Employee::with('department')
            ->selectRaw('department_id, COUNT(*) as total')
            ->whereNotNull('department_id')
            ->groupBy('department_id')
            ->orderByDesc('total')
            ->get();

        // Employees by employment status
        $statusEmployees = Employee::with('employmentStatus')
            ->selectRaw('employment_status_id, COUNT(*) as total')
            ->whereNotNull('employment_status_id')
            ->groupBy('employment_status_id')
            ->orderByDesc('total')
            ->get();

        // Recent employees
        $recentEmployees = Employee::with([
            'department',
            'position',
            'employmentStatus'
        ])
            ->latest()
            ->take(5)
            ->get();

        // Employees added this month
        $newEmployeesThisMonth = Employee::whereMonth(
            'created_at',
            now()->month
        )
            ->whereYear(
                'created_at',
                now()->year
            )
            ->count();

        return view('employee.home', compact(
            'totalEmployees',
            'totalDepartments',
            'totalPositions',
            'totalStatuses',
            'departmentEmployees',
            'statusEmployees',
            'recentEmployees',
            'newEmployeesThisMonth'
        ));
    }



    public function show($id)
    {

        $employee = Employee::findOrFail($id);
        return view('employee.show', ['employee' => $employee]);
    }
    public function create()
    {
        $employmentStatuses = EmploymentStatus::all();
        $positions = Position::all();
        $departments = Department::all();
        $salary_Rates = SalaryRates::all();

        return view('employee.create', compact('departments', 'positions', 'salary_Rates', 'employmentStatuses', ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'department_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
            'employment_status_id' => 'required|exists:employment_statuses,id',
            'salary_rate_id' => 'required|exists:salary_rates,id',
            'date_hired' => 'required|date',
        ]);

        $lastEmployee = Employee::latest('id')->first();

        if ($lastEmployee) {
            $nextNumber = $lastEmployee->id + 1;
        } else {
            $nextNumber = 1;
        }

        $employeeNumber = 'EMP-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        Employee::create([
            'employee_number' => $employeeNumber,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'department_id' => $request->department_id,
            'position_id' => $request->position_id,
            'salary_rate_id' => $request->salary_rate_id,
            'employment_status_id' => $request->employment_status_id,
            'date_hired' => $request->date_hired,

        ]);
        return redirect()->route('employee.index');
    }
    public function edit($id)
    {

        $employmentStatuses = EmploymentStatus::all();
        $positions = Position::all();
        $departments = Department::all();
        $salary_Rates = SalaryRates::all();
        $employee = Employee::findOrFail($id);
        return view('employee.edit', ['employee' => $employee], compact('departments', 'positions', 'salary_Rates', 'employmentStatuses', ));
    }
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([

            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'department_id' => 'required',
            'position_id' => 'required',
            'salary_rate_id' => 'required',
            'employment_status_id' => 'required',
            'date_hired' => 'required',


        ]);

        $employee->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'department_id' => $request->department_id,
            'position_id' => $request->position_id,
            'salary_rate_id' => $request->salary_rate_id,
            'employment_status_id' => $request->employment_status_id,
            'date_hired' => $request->date_hired,

        ]);


        return redirect()
            ->route('employee.index')
            ->with('success', 'Employee updated successfully!');
    }


    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();

        return redirect()
            ->route('employee.index')
            ->with('success', 'Employee deleted successfully.');
    }





}
