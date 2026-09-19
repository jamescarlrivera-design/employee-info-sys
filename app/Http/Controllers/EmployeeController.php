<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){

       $Employees = Employee::orderBy('id', 'asc')->get();
       return view('employee.index', ["employees" => $Employees]);
 
    }
    public function show($id){
        $employee = Employee::findOrFail($id);
        return view('employee.show', ['employee'=> $employee]);
    }
    public function create(){

    return view('employee.create');
    }

    public function store(Request $request)
    {
        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'department' => $request->department,
        ]);
        return redirect()->route('employee.index');
    }
}
