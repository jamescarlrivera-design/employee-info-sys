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
}
