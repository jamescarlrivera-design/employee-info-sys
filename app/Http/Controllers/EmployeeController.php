<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Employee;
use App\Models\EmploymentStatus;
use App\Models\SalaryRates;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;




class EmployeeController extends Controller
{
    public function adminindex(Request $request)
    {

        $departments = Department::orderBy('department_name')->get();
     
        $query = Employee::with([
            'user',
            'department',
            'position',
            'employmentStatus',
            'salaryrates'
            
          
        ]);

         if ($request->filled('department')){
            $query->where('department_id', $request->department);
         }
            

         $employees = $query 
         -> orderBy('last_name')
         ->paginate(10)
         ->withQueryString();

        return view('admin.index', compact('employees', 'departments'));
    }



    public function employeeindex(Request $request)
    {

        $departments = Department::orderBy('department_name')->get();
     
        $query = Employee::with([
            'user',
            'department',
            'position',
            'employmentStatus',
            'salaryrates'
            
          
        ]);

         if ($request->filled('department')){
            $query->where('department_id', $request->department);
         }
            

         $employees = $query 
         -> orderBy('last_name')
         ->paginate(10)
         ->withQueryString();

        return view('employee.index', compact('employees', 'departments'));
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

        return view('admin.home', compact(
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
        return view('admin.show', ['employee' => $employee]);
    }
    public function create()
    {
        $employmentStatuses = EmploymentStatus::all();
        $positions = Position::all();
        $departments = Department::all();
        $salary_Rates = SalaryRates::all();

        return view('admin.create', compact('departments', 'positions', 'salary_Rates', 'employmentStatuses', ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([


            // employee 
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'address' => 'nullable',
            'department_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
            'employment_status_id' => 'required|exists:employment_statuses,id',
            'salary_rate_id' => 'required|exists:salary_rates,id',
            'date_hired' => 'required|date',



            // User Acc

            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',

        ]);



        DB::transaction(function () use ($validated) {


            $fullName = trim(
                $validated['first_name'] . ' ' .
                ($validated['middle_name'] ?? '') . ' ' .
                $validated['last_name']
            );

            // Create User
            $user = User::create([
                'name' => $fullName,
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);


            Employee::create([


                'user_id' => $user->id,
                'employee_number' => 'EMP-' . str_pad(
                    Employee::count() + 1,
                    4,
                    '0',
                    STR_PAD_LEFT
                ),


                'first_name' => $validated['first_name'],
                'middle_name' => $validated['middle_name'] ?? null,
                'last_name' => $validated['last_name'],
                'department_id' => $validated['department_id'],
                'address' => $validated['address'],
                'position_id' => $validated['position_id'],
                'employment_status_id' => $validated['employment_status_id'],
                'salary_rate_id' => $validated['salary_rate_id'],
                'date_hired' => $validated['date_hired'],

            ]);
        });
        return redirect()->route('admin.index')
            ->with('success', 'Employee added successfully!');

    }





    public function edit($id)
    {
        $Users = User::all();
        $employmentStatuses = EmploymentStatus::all();
        $positions = Position::all();
        $departments = Department::all();
        $salary_Rates = SalaryRates::all();
        $employee = Employee::findOrFail($id);
        return view('admin.edit', ['employee' => $employee], compact('departments', 'positions', 'salary_Rates', 'employmentStatuses', 'Users', ));
    }
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $request->validate([

            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $employee->user_id,



            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'address' => 'nullable | string',
            'department_id' => 'required',
            'position_id' => 'required',
            'salary_rate_id' => 'required',
            'employment_status_id' => 'required',
            'date_hired' => 'required',


        ]);


        $employee->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);


        $employee->update([

            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'department_id' => $request->department_id,
            'position_id' => $request->position_id,
            'salary_rate_id' => $request->salary_rate_id,
            'employment_status_id' => $request->employment_status_id,
            'date_hired' => $request->date_hired,

        ]);


        return redirect()
            ->route('admin.index')
            ->with('success', 'Employee updated successfully!');
    }


    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();

        return redirect()
            ->route('admin.index')
            ->with('success', 'Employee deleted successfully.');
    }





}
