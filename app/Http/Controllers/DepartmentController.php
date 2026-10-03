<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function adminindex(){
        $departments = Department::all();
        return view('admin.departments.index', compact('departments'));
    }


    public function employeeindex(){
        $departments = Department::all();
        return view('employee.department', compact('departments'));
    }
}
